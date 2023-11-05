<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Episode;

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
}
