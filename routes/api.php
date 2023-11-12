<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class,'me']);
    Route::post('/logout', [AuthController::class,'logout']);

    Route::get('/phim/{slug}', [ApiController::class,'get_movie']);
    Route::get('/the-loai/{slug}', [ApiController::class,'get_movie_by_category']);
    Route::get('/khu-vuc/{slug}', [ApiController::class,'get_movie_by_region']);
});

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class,'login'])->name('login');
    Route::post('/register', [AuthController::class,'register'])->name('register');
});
