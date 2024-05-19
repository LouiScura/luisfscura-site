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
        $posts = Post::with(['categories' => function ($query) {
            $query->select('category_id', 'name');
        }])
            ->select(['id', 'title', 'body', 'slug', 'excerpt', 'image'])
            ->simplePaginate(5);

        $categories = $posts->pluck('categories')->collapse()->unique('category_id');

        return Inertia::render('Blog', [
            'categories' => $categories,
            'posts' => $posts
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
