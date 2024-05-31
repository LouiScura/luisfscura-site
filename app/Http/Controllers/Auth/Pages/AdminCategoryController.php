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
            'category' => $category->only('id', 'name', 'slug')
        ]);
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        Category::create($validated);

        return redirect('/admin/categories')
            ->with('success', 'Category created successfully.');

    }

    public function update(Category $category, StoreCategoryRequest $request)
    {
        $category->update($request->validated());

        return redirect('/admin/categories')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')->with('deletion', 'Category deleted successfully');
    }

}
