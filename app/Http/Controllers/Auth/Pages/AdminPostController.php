<?php

namespace App\Http\Controllers\Auth\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\AdminPostResource;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Database\Eloquent\Builder;

use Inertia\Inertia;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::latest('created_at')->paginate(14);

        return Inertia::render('Posts/Index', [
            'posts' => AdminPostResource::collection($posts)
        ]);
    }

    public function create()
    {
        return Inertia::render('Posts/Create',  [
            'categories' => CategoryResource::collection(Category::all())
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $post = new Post($request->validated());
        $post->save();

        $post->categories()->sync($request->categories);

        return redirect('/admin/posts')
            ->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', [
            'post' => $post->only('id', 'title', 'slug', 'categories', 'body', 'excerpt'),
            'categories' => CategoryResource::collection(Category::all())
        ]);
    }
}
