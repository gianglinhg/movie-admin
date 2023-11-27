<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Episode;
use App\Models\Site_model;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct(){
        $this->site_model = new Site_model;
    }
    public function home(){
        $data = [];
        $data['latest_movies'] = Movie::orderBy('created_at','asc')->limit(5)->get();
        $data['viewest_movies'] = Movie::orderBy('view_day','desc')->limit(10)->get();
        $data['ongoing_movies'] = Movie::where('status', 'ongoing')->limit(10)->get();
        return view('site.home', $data);
    }
    public function show_single(string $slug){
        $movie = Movie::where('slug', $slug)->first();
        return view('site.show-single', compact('movie'));
    }
    public function watch_movie($movie_slug, $episode, $episode_id){
        $data = [];
        $data['movie'] = Movie::where("slug", $movie_slug)->first();
        $data['episode'] = Episode::where('slug', $episode)->where('id', $episode_id)->first();
        return view('site.watch', $data);
    }
    public function watch(string $slug){
        $movie = Movie::where('slug', $slug)->first();
        return view('site._watch', compact('movie'));
    }

}
