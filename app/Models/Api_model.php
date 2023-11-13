<?php

namespace App\Models;

use App\Http\Controllers\Controller;

class Api_model extends Controller
{
    public function check_object($object){
        if(empty($object)){
            return response()->json([
                "status"=> false,
                "message"=> "Không tồn tại",
            ], 404);
        }
        return true;
    }
}
