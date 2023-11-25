<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/', [SiteController::class, 'home'])->name('home');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
