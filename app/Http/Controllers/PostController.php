<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::all()->map->only(
            'id',
            'name'
        );

        $posts = Post::query()
            ->select(['id', 'title', 'body', 'slug', 'excerpt', 'image'])
            ->simplePaginate(5);

        return Inertia::render('Blog', [
            'categories' => $categories,
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return Inertia::render('Post', [
            'post' => $post->only(
                'id',
                'title',
                'body',
                'slug',
                'excerpt',
                'image'
            ),
        ]);
    }
}