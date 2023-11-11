<?php

namespace Modules\Crawler\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class CrawlerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('crawler::index');
    }

    public function api(Request $request){
        // Gửi yêu cầu đến API
        $url = 'https://ophim1.com/movie/drstone-new-world';
        $client = new Client();
        $res = $client->get($url);
        $content = (string) $res->getBody();
        $data = json_decode($content, true);
        dd($data);
    }
}
