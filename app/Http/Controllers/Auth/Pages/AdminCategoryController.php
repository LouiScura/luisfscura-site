<?php

namespace App\Http\Controllers\Auth\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Database\QueryException;
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
        try {
            $category = Category::findOrFail($category->id);
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
        } catch (QueryException $e) {
            // Check if the error is a foreign key constraint failure
            if ($e->getCode() == 23000) { // This is the SQL error code for integrity constraint violation
                return redirect()->route('categories.index')->with('deletion', 'Cannot delete this category because it is associated with one or more posts.');
            } else {
                return back()->with('deletion', 'An unexpected error occurred. Please try again.');
            }
        } catch (\Exception $e) {
            return back()->with('deletion', 'An error occurred: ' . $e->getMessage());
        }

    }

}
