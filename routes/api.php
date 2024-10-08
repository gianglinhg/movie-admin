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
    Route::post('/logout', [AuthController::class,'logout']);
    Route::get('/user', [AuthController::class,'me']);

    Route::get('/phim/{slug}', [ApiController::class,'get_movie']);
    Route::get('/watch/{movie}/{data}', [ApiController::class, 'watch_movie'])->where('data', '.*');
    Route::get('/dien-vien/{slug}', [ApiController::class,'get_actor_movie']);
    Route::get('/dao-dien/{slug}', [ApiController::class,'get_director_movie']);
    Route::get('/tag/{slug}', [ApiController::class,'get_tag_movie']);
    Route::get('/phim-moi-cap-nhat', [ApiController::class,'get_latest_update']);
    Route::get('/phim-banner', [ApiController::class,'get_random_movie_banner']);
    
    Route::get('/the-loai/{slug}', [ApiController::class,'get_movie_by_category']);
    Route::get('/khu-vuc/{slug}', [ApiController::class,'get_movie_by_region']);
    Route::get('/danh-sach/{slug}', [ApiController::class,'get_movies_of_type']);
    
    Route::get('/the-loai', [ApiController::class,'get_all_categories']);
    Route::get('/khu-vuc', [ApiController::class,'get_all_regions']);
    
    Route::get('/filter', [ApiController::class,'filter_movie']);
    Route::get('/search', [ApiController::class,'search_movie']);
    Route::get('/years', [ApiController::class,'get_all_year']);
});

Route::post('/login', [AuthController::class,'login'])->name('login');
Route::post('/register', [AuthController::class,'register'])->name('register');
