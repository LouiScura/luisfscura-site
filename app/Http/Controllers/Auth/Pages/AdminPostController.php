<?php

namespace App\Http\Controllers\Auth\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Inertia\Inertia;

class AdminPostController extends Controller
{
    public function index()
    {
        return Inertia::render('Posts/Index');
    }

    public function create()
    {
        return Inertia::render('Posts/Create',  [
            'categories' => Category::all()
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
}
