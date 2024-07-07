<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostHomeResource;
use App\Http\Resources\ProjectHomeResource;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $posts =  Post::query()
        ->take(5)
        ->latest()
        ->get();

        foreach ($posts as $post) {
            $post->image = $post->image ? Storage::url($post->image) : '/images/placeholder2.png';
        }

        $projects = Project::with('tags')
            ->latest()
            ->get();

        foreach ($projects as $project) {
            $project->image = $project->image ? Storage::url($project->image) : '/images/placeholder2.png';
        }

        return inertia('Home', [
            'posts' => PostHomeResource::collection($posts),
            'projects' => ProjectHomeResource::collection($projects),
        ]);
    }
}
