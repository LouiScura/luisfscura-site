<?php

namespace App\Http\Controllers\Auth\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all()->map->only(
            'id',
            'name'
        );

        return Inertia::render('Categories/Index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return Inertia::render('Categories/Create');
    }

    public function edit(Category $category)
    {
        return Inertia::render('Categories/Edit', [
            'category' => $category->get()->map->only('id', 'name', 'slug')
        ]);
    }

    public function store(StoreCategoryRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        Category::create($validated);

        return redirect('/admin/categories')
            ->with('success', 'Category created successfully.');

    }

    public function destroy(Category $category)
    {
        $category->delete();
        sleep(1);

        return redirect()->route('category.index')->with('deletion', 'Category deleted successfully');
    }

}
