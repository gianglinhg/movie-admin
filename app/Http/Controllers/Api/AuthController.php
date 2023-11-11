<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login(Request $request){
        $user = User::where("email", $request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password, [])){
            return response()->json([
                "messages"=> "User không tồn tại"
            ], 404);
        }
        $token = $user->createToken("authToken")->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'type_token' => 'Bearer'
        ], 200);
    }
    public function register(Request $request){
        $messages = [
            "email.email"=> "Không đúng định dạng email !",
        ];
        $validator = Validator::make($request->all(), [
            "email"=> "email",
        ], $messages);
        if( $validator->fails() ){
            return response()->json([
                "messages" => $validator->errors(),
            ], 500);
        };
        $user = User::create([
            "email"=> $request->email,
            "password"=> Hash::make($request->password),
            "name"=> $request->name,
        ]);
        if( $user ){
            return response()->json([
                "messages"=> "Đăng ký user thành công !"
            ], 200);
        }
    }
    public function me(){
        return response()->json(Auth::user(), 200);
    }
    public function logout(){
        Auth::user()->tokens()->delete();

        return response()->json([
            "messages" => "Logout thành công",
        ], 200);
    }
}
