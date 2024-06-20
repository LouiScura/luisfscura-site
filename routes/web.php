<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\Pages\AdminPostController;
use App\Http\Controllers\Auth\Pages\AdminCategoryController;
use App\Http\Controllers\Auth\Pages\AdminProjectController;
use App\Http\Controllers\Auth\Pages\AdminTagController;
use App\Http\Controllers\HomeController;

// Homepage
Route::get('/', [HomeController::class, 'index']);

// Single Post
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post.show');

// All Other Posts
Route::get('/blog/{category:slug?}', [PostController::class, 'index'])->name('blog.index');

// Now
Route::get('/now', function() {
    return Inertia::render('Now');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin
Route::group(['prefix' => 'admin',  'middleware' => ['auth', 'verified']], function(){
    Route::resource('posts', AdminPostController::class)
        ->names([
            'index'   => 'dashboard',
        ]);

    Route::resource('categories', AdminCategoryController::class);

    Route::resource('projects', AdminProjectController::class);

    Route::resource('tags', AdminTagController::class);
});


Route::view('/welcome', 'welcome');

require __DIR__.'/auth.php';
