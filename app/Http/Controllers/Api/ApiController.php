<?php

namespace App\Http\Controllers\Api;

use App\Models\Movie;
use App\Models\Episode;
use App\Models\Api_model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function __construct(){
        $this->api_model = new Api_model();
    }
    public function get_movie(string $slug){
        $movie = Movie::where("slug", $slug)->first();
        if(!$movie){
            return response()->json([
                "status" => false,
                "message" => "Phim không tồn tại"
            ], 404);
        }
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
        $category = DB::table('categories')->where("slug", $slug)->first();
        if(!$category){
            return response()->json([
                "status"=> false,
                "message"=> "Thể loại không tồn tại",
            ], 404);
        }
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
        $region = DB::table('regions')->where("slug", $slug)->first();
        if(!$region){
            return response()->json([
                "status"=> false,
                "message"=> "Khu vực không tồn tại",
            ], 404);
        }
        $movies = Movie::select('id','name','origin_name', 'slug','thumb_url','poster_url', 'publish_year')
        ->whereHas('regions', function ($query) use ($region) {
            $query->where('region_id', $region->id);
        })->get();
        return response()->json([
            'status'=> true,
            $slug => $movies
        ], 200);
    }
}
