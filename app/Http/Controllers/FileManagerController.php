<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class FileManagerController extends Controller
{
    public function index(){
        return view("filemanager");
    }
    public function api(Request $request){
        // Gửi yêu cầu đến API
        $url = 'https://ophim1.com/danh-sach/phim-moi-cap-nhat?page=1';
        $client = new Client();
        $res = $client->get($url);
        $content = (string) $res->getBody();
        $data = json_decode($content, true);
        dd($data);
    }
}
