<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Episode;
use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function handle_episodes(array $episodes, string $movie_id){
        $movie_episodes = Episode::where('movie_id', $movie_id)->get()->pluck('id')->toArray();

        foreach ($episodes as $episode) {
            $episodeId = $episode['id'];

            if (in_array($episodeId, $movie_episodes)) {
                // Cập nhật
                $existingEpisode = Episode::where('id', $episodeId)->first();
                $existingEpisode->update([
                    'server' => $episode['server'],
                    'name' => $episode['name'],
                    'slug' => $episode['slug'],
                    'type' => $episode['type'],
                    'link' => $episode['link'],
                ]);
            } else {
                // Thêm mới
                Episode::create([
                    'id' => $episodeId,
                    'movie_id' => $movie_id,
                    'server' => $episode['server'],
                    'name' => $episode['name'],
                    'slug' => $episode['slug'],
                    'type' => $episode['type'],
                    'link' => $episode['link'],
                ]);
            }

            // Loại bỏ episode này khỏi danh sách $movie_episodes
            $movie_episodes = array_diff($movie_episodes, [$episodeId]);
        }

        // Xóa các episode còn lại trong $movie_episodes (các episode đã bị xóa từ dữ liệu gốc)
        if (!empty($movie_episodes)) {
            Episode::where('movie_id', $movie_id)->whereIn('id', $movie_episodes)->delete();
        }
    }
    public function handle_tags($data,array $info_table, string $movie_id) {
        $table_name = $info_table['name'];
        $table_col = $info_table['col'];
        $main = $info_table['main'];
        $tags = DB::table($table_name)->where('movie_id', $movie_id)->pluck($table_col)->toArray();
        if(isset($data) && !empty($data)) {
            foreach($data as $item) {
                if(!in_array($item, $tags)) {
                    if(!is_numeric($item)){
                        $id = DB::table($main)->insertGetId([
                            'name' => $item,
                            'slug' => Str::slug($item),
                            'name_md5' => md5($item),
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);
                    }
                    DB::table($table_name)->insert([
                        'movie_id' => $movie_id,
                        $table_col => is_numeric($item) ? $item : $id,
                    ]);
                }
                $tags = array_diff($tags, [$item]);
            }
        }
        DB::table($table_name)->where('movie_id', $movie_id)->whereIn($table_col, $tags)->delete();
    }

    public function store_movie(array $data)
    {

        $movie = Movie::create([
            'name' => $data['name'],
            'origin_name' => $data['origin_name'],
            'slug' => $data['slug'],
            'content' => $data['content'],
            'type' => $data['type'],
            'status' => $data['status'],
            'trailer_url' => $data['trailer_url'],
            'thumb_url' => asset_save($data['thumb_url']),
            'poster_url' => asset_save($data['poster_url']),
            'publish_year' => $data['publish_year'],
            'quality' => $data['quality'],
            'language' => $data['language'],
            'episode_time' => $data['episode_time'],
            'episode_total' => $data['episode_total'],
            'episode_current' => $data['episode_current'],
            'is_shown_in_theater' => $data['is_shown_in_theater'] ?? 0,
            'is_recommended' => $data['is_recommended ?? 0'],
            'is_copyright' => $data['is_copyright ?? 0'],
            'is_sensitive_content' => $data['is_sensitive_content'] ?? 0,
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
        ]);
        $movie_id = $movie->id;
        if ($movie) {
            if (isset($data['episodes']) && !empty($data['episodes'])) {
                foreach ($data['episodes'] as $episode) {
                    $movie->addEpisode($episode, $movie_id);
                }
            }
            if (isset($data['categories']) && !empty($data['categories'])) {
                addSub('category_movie',$data['categories'], $movie_id, 'category_id');
            }
            if (isset($data['regions']) && !empty($data['regions'])) {
                addSub('movie_region',$data['regions'], $movie_id, 'region_id');
            }
            $this->handle_tags($data['directors'],['name' => 'director_movie', 'col' => 'director_id','main' => 'directors'], $movie->id);
            $this->handle_tags($data['tags'],['name' => 'movie_tag', 'col' => 'tag_id', 'main' => 'tags'], $movie->id);
            $this->handle_tags($data['actors'],['name' => 'actor_movie', 'col' => 'actor_id', 'main' => 'actors'], $movie->id);
        }
        toastr('Tạo phim mới thành công', 'success');
        return redirect()->route('admin.movies.index');
    }
}
