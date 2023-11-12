<?php

namespace App\Models;

use App\Http\Controllers\Controller;

class Api_model extends Controller
{
    public static function test($slug){
        return $slug;
    }
}
