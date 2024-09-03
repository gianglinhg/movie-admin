<?php
use Illuminate\Support\Facades\Route;

use UniSharp\LaravelFilemanager\Lfm;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Classes\TagController;
use App\Http\Controllers\Classes\ActorController;
use App\Http\Controllers\Classes\RegionController;
use App\Http\Controllers\Classes\StudioController;
use App\Http\Controllers\Classes\CatalogController;
use App\Http\Controllers\Classes\CategoryController;
use App\Http\Controllers\Classes\DirectorController;

// Route::get("popup", [FileManagerController::class,"index"])->name("filemanager");
Route::group(['prefix' => 'laravel-filemanager', 'middleware'], function () {
  Lfm::routes();
});
Route::redirect('/', '/admin/dashboard');

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
  Route::redirect('/', '/admin/dashboard');
  Route::middleware(['auth','verified'])->get('/dashboard', function () {
    return view('g-movie.dashboard');
  })->name('dashboard');

  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::resource('movies', MovieController::class);
  Route::get('/users', [UserController::class, 'index'])->name('users');

  Route::prefix('catalogs')->name('catalogs.')->group(function () {
    Route::get('/', [CatalogController::class, 'index']);
    Route::post('/store', [CatalogController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [CatalogController::class, 'edit'])->name('edit');
    Route::post('/destroy/{id}', [CatalogController::class, 'destroy'])->name('destroy');
  });
  Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/store', [CategoryController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::post('/destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');
  });
  Route::prefix('tags')->name('tags.')->group(function () {
    Route::get('/', [TagController::class, 'index']);
    Route::post('/store', [TagController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [TagController::class, 'edit'])->name('edit');
    Route::post('/destroy/{id}', [TagController::class, 'destroy'])->name('destroy');
  });
  Route::prefix('regions')->name('regions.')->group(function () {
    Route::get('/', [RegionController::class, 'index']);
    Route::post('/store', [RegionController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [RegionController::class, 'edit'])->name('edit');
    Route::post('/destroy/{id}', [RegionController::class, 'destroy'])->name('destroy');
  });
  Route::prefix('actors')->name('actors.')->group(function () {
    Route::get('/', [ActorController::class, 'index']);
    Route::post('/store', [ActorController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [ActorController::class, 'edit'])->name('edit');
    Route::post('/destroy/{id}', [ActorController::class, 'destroy'])->name('destroy');
  });
  Route::prefix('directors')->name('directors.')->group(function () {
    Route::get('/', [DirectorController::class, 'index']);
    Route::post('/store', [DirectorController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [DirectorController::class, 'edit'])->name('edit');
    Route::post('/destroy/{id}', [DirectorController::class, 'destroy'])->name('destroy');
  });
  Route::prefix('studios')->name('studios.')->group(function () {
    Route::get('/', [StudioController::class, 'index']);
    Route::post('/store', [StudioController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [StudioController::class, 'edit'])->name('edit');
    Route::post('/destroy/{id}', [StudioController::class, 'destroy'])->name('destroy');
  });
});

require __DIR__.'/auth.php';
