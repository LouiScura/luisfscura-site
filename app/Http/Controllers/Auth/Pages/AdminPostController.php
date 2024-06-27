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

        // Check if there is a file in the request
        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('uploads', 'public');
            $post->image  = $filePath;
        }

        $post->save();

        $post->categories()->sync($request->categories);

        return redirect('/admin/posts')
            ->with('success', 'Post created successfully.');
    }

    public function update(Post $post, StorePostRequest $request)
    {
        $post->update($request->validated());

        return redirect('/admin/posts')
            ->with('success', 'Post updated successfully.');
    }

    public function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', [
            'post' => $post->only('id', 'title', 'slug', 'categories', 'body', 'excerpt'),
            'categories' => CategoryResource::collection(Category::all())
        ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Post deleted successfully');
    }
}
