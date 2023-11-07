<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Episode;
use Carbon\Carbon;
use DB;

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
                            'slug' => \Str::slug($item),
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
}
