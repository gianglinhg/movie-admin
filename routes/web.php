<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/phim/{slug}', [SiteController::class, 'show_single'])->name('show_single');
Route::get('/xem/{slug}', [SiteController::class, 'watch'])->name('watch');
Route::get('/watch/{movie}/{tap}-{id}', [SiteController::class, 'watch_movie'])->name('watch')->where(['tap' => '.*']);

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
