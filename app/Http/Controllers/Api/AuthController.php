<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required | email',
                'password' => 'required',
            ], [
                "required" => "Trường :attribute bắt buộc nhập!",
                "email.email" => "Không đúng định dạng email !",
            ]);
            $user = User::where("email", $request->email)->first();
            
            if (!$user) {
                throw ValidationException::withMessages([
                    'email' => ['Email này không tồn tại'],
                ]);
            }
            if(!Hash::check($request->password, $user->password)){
                throw ValidationException::withMessages([
                    'password' => ['Mật khẩu không đúng'],
                ]);
            }
            $token = $user->createToken("authToken")->plainTextToken;
            return response()->json([
                'access_token' => $token,
                'type_token' => 'Bearer'
            ], 200);
        } catch (\Throwable $th) {
            if ($th instanceof ValidationException) {
                return response()->json([
                    'errors' => $th->errors(),
                ], 500);
            }
            return response()->json([
                'errors' => $th->getMessage(),
            ], 403);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required | email",
            "password" => "required | min:8 | max: 20",
        ], [
            "email.email" => "Không đúng định dạng email !",
            "required" => "Trường :attribute bắt buộc nhập!",
        ]);
        if ($validator->fails()) {
            return response()->json([
                "messages" => $validator->errors(),
            ], 500);
        };
        $user = User::create($validator->safe()->only(['name', 'email', 'password']));
        $token = $user->createToken("authToken")->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'type_token' => 'Bearer'
        ], 200);
    }

    public function me()
    {
        return response()->json(Auth::user(), 200);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();

        return response()->json([
            "messages" => "Logout thành công",
        ], 200);
    }
}
