<?php

use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileManagerController;


// Route::get("popup", [FileManagerController::class,"index"])->name("filemanager");
Route::get("api", [FileManagerController::class,"api"])->name("filemanager");
Route::group(['prefix' => 'laravel-filemanager', 'middleware'], function () {
    Lfm::routes();
});

Route::get('/', function () {
    return view('g-movie.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('movies', MovieController::class);
    Route::get('/users', [UserController::class, 'index'])->name('users');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
require __DIR__.'/classes.php';
