<?php

namespace App\Http\Controllers\Auth\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return Inertia::render('Projects/Index', [
            'projects' => ProjectResource::collection($projects)
        ]);
    }

    public function create()
    {
        return Inertia::render('Projects/Create');
    }

    public function store(StoreProjectRequest $request)
    {
        $project = new Project($request->validated());

        // Check if there is a file in the request
        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('uploads', 'public');
            $project->image  = $filePath;
        }

        $project->save();

        return redirect('/admin/projects')
            ->with('success', 'Project created successfully.');

    }
}
