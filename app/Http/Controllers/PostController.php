<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\CategoryResource;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index(Category $category = null)
    {
        $posts = Post::with('categories')
            ->when($category, function ($query) use ($category) {
                $query->whereHas('categories', function ($query) use ($category) {
                    $query->where('categories.id', $category->id);
                });
            })
            ->latest()
            ->latest('created_at')
            ->paginate(12);

        $categories = Category::has('posts')->get();

        return inertia('Blog', [
            'posts' => PostResource::collection($posts),
            'categories' => CategoryResource::collection($categories),
            'selectedCategory' => fn () => $category ? CategoryResource::make($category) : null,
        ]);
    }

    public function show(Post $post)
    {

        return Inertia::render('Posts/Show', [
            'post' => $post->only(
                'id',
                'title',
                'body',
                'slug',
                'image',
                'created_at'
            )
        ]);
    }
}
