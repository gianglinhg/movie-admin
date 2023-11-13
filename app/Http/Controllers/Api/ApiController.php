<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Actor;
use App\Models\Movie;
use App\Models\Region;
use App\Models\Episode;
use App\Models\Category;
use App\Models\Director;
use App\Models\Api_model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function __construct(){
        $this->api_model = new Api_model();
    }
    public function watch_movie($movie_slug, $data){
        $pattern = '/^(?P<episode>tap-\d+)-(?P<id>\d+)$/';
        if (preg_match($pattern, $data, $matches)) {
            $episode_slug = $matches['episode'];
            $episode_id = $matches['id'];
        }else{
            return response()->json([
                "status" => false,
                "message" => "Đường dẫn không hợp lệ"
            ],404);
        }
        $movie = Movie::where("slug", $movie_slug)->first();
        $episode = Episode::where('slug', $episode_slug)->where('id', $episode_id)->first();
        if(!$episode || !$movie){
            return response()->json([
                'status'=> false,
                'message'=> 'Tập phim không tồn tại'
            ], 404);
        }
        return response()->json([
            "status" => true,
            "movie"=> $movie,
            "episode"=> $episode,
        ],200);
    }
    public function get_movie(string $slug){
        $movie = Movie::where("slug", $slug)->first();
        if(!$movie) return $this->api_model->check_object($movie);
        unset($movie->update_handler);
        unset($movie->user_name);
        $res = $episodes = [] ;
        $res = $movie->toArray();
        $res['directors'] = $movie->directors->pluck('name')->toArray();
        $res['actors'] = $movie->actors->pluck('name')->toArray();
        $res['tags'] = $movie->tags->pluck('name')->toArray();
        foreach($movie->categories as $category){
            $res['categories'][] =  [
                'id'=> $category->id,
                'name'=> $category->name,
                'slug'=> $category->slug,
            ];
        }
        foreach($movie->regions as $region){
            $res['regions'][] =  [
                'id'=> $region->id,
                'name'=> $region->name,
                'slug'=> $region->slug,
            ];
        }
        $episodes_movie = Episode::select('id','name','server','slug','type','link')->where('movie_id', $movie->id)
        ->orderByRaw("CASE WHEN slug REGEXP '^[0-9]+$' THEN LENGTH(slug) ELSE 99999 END, slug ASC")
        ->get()->toArray();
        foreach ($episodes_movie as $item) {
            $episodes['server_name'] = $item['server'];
            $episodes['server_data'][] = $item;
        }
        return response()->json([
            "status"=> true,
            "movie"=> $res,
            "episodes"=> $episodes
        ], 200);
    }
    public function get_movie_by_category(string $slug){
        $category = Category::where("slug", $slug)->first();
        if(!$category) return $this->api_model->check_object($category);
        $movies = Movie::select('id','name','origin_name', 'slug','thumb_url','poster_url', 'publish_year')
        ->whereHas('categories', function ($query) use ($category) {
            $query->where('category_id', $category->id);
        })->get();
        return response()->json([
            'status'=> true,
            $slug => $movies
        ], 200);
    }
    public function get_movie_by_region(string $slug){
        $region = Region::where("slug", $slug)->first();
        if(!$region) return $this->api_model->check_object($region);
        $movies = Movie::select('id','name','origin_name', 'slug','thumb_url','poster_url', 'publish_year')
        ->whereHas('regions', function ($query) use ($region) {
            $query->where('region_id', $region->id);
        })->get();
        return response()->json([
            'status'=> true,
            $slug => $movies
        ], 200);
    }
    public function get_all_categories(){
        $categories = Category::select('id', 'name', 'slug')->get();
        return response()->json($categories, 200);
    }
    public function get_all_regions(){
        $regions = Region::select('id', 'name', 'slug')->get();
        return response()->json($regions, 200);
    }
    public function get_actor_movie(string $slug){
        $actor = Actor::where('slug', $slug)->first();
        if(!$actor) return $this->api_model->check_object($actor);
        $movies = Movie::select('id','name','origin_name', 'slug','thumb_url','poster_url', 'publish_year')
        ->whereHas('actors', function ($query) use ($actor) {
            $query->where('actor_id', $actor->id);
        })->get();
        return response()->json($movies, 200);
    }
    public function get_director_movie(string $slug){
        $director = Director::where('slug', $slug)->first();
        if(!$director) return $this->api_model->check_object($director);
        $movies = Movie::select('id','name','origin_name', 'slug','thumb_url','poster_url', 'publish_year')
        ->whereHas('directors', function ($query) use ($director) {
            $query->where('director_id', $director->id);
        })->get();
        return response()->json($movies, 200);
    }
    public function get_tag_movie(string $slug){
        $tag = Tag::where('slug', $slug)->first();
        if(!$tag) return $this->api_model->check_object($tag);
        $movies = Movie::select('id','name','origin_name', 'slug','thumb_url','poster_url', 'publish_year')
        ->whereHas('tags', function ($query) use ($tag) {
            $query->where('tag_id', $tag->id);
        })->get();
        return response()->json($movies, 200);
    }
    public function get_latest_update(Request $request){
        $res = array();
        $items = $request->get('total');
        $total = (isset($items) && (int)$items > 0) ? (int)$items : 100;
        $movies = Movie::select('id','name','origin_name', 'slug','thumb_url','poster_url', 'created_at')->latest()->take($total)->get();
        foreach($movies as $movie){
            $res[$movie->id]['id'] =  $movie['id'];
            $res[$movie->id]['name'] =  $movie['name'];
            $res[$movie->id]['origin_name'] =  $movie['origin_name'];
            $res[$movie->id]['thumb_url'] =  $movie['thumb_url'];
            $res[$movie->id]['poster_url'] =  $movie['poster_url'];
            $res[$movie->id]['created_at'] =  Carbon::parse($movie['created_at'])->format('d-m-Y H:i:s');
        }
        return response()->json($res, 200);
    }
}
