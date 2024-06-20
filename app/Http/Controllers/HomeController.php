<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostHomeResource;
use App\Http\Resources\ProjectHomeResource;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts =  Post::query()
        ->take(5)
        ->latest()
        ->get();

        $projects = Project::with('tags')
            ->latest()
            ->get();

        return inertia('Home', [
            'posts' => PostHomeResource::collection($posts),
            'projects' => ProjectHomeResource::collection($projects),
        ]);
    }
}
