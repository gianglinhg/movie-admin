<?php

namespace App\Http\Controllers;

use App\Models\Movie;
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
}
