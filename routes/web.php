<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\Pages\AdminPostController;
use App\Http\Controllers\Auth\Pages\AdminCategoryController;
use App\Models\Project;
use App\Models\Post;

// Homepage

Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'posts' => Post::query()
            ->select(['id', 'title', 'slug', 'excerpt', 'image'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get(),
        'projects'  => Project::with(['tags' => fn($query) =>
                    $query->select('tag_id', 'name')
                ])
                ->select('id', 'title', 'image', 'link')
                ->get()
        ]);
});

// Blog

Route::get('/blog', [PostController::class, 'index']);

Route::get('/blog/{post:slug}', [PostController::class, 'show']);

// Now

Route::get('/now', function() {
    return Inertia::render('Now');
});

//Route::get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Posts
Route::get('/admin/posts', [AdminPostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->middleware(['auth', 'verified']);

Route::post('/admin/posts', [AdminPostController::class, 'store']);

// Admin Categories
Route::get('/admin/categories', [AdminCategoryController::class, 'index'])->middleware(['auth', 'verified'])->name('category.index');

Route::post('/admin/categories', [AdminCategoryController::class, 'store']);

Route::get('/admin/categories/create', [AdminCategoryController::class, 'create'])->middleware(['auth', 'verified']);

Route::get('/admin/categories/{category}/edit', [AdminCategoryController::class, 'edit'])
    ->name('category.edit')
    ->middleware(['auth', 'verified']);

Route::delete('/admin/{category}',[AdminCategoryController::class,'destroy'])->name('category.destroy');


require __DIR__.'/auth.php';
