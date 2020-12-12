<?php

namespace App\Http\Controllers;

use App\Category;
use App\SuperCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $super_categories = SuperCategory::all();

        return inertia()->render('Dashboard/categories/index', [
            'categories' => $categories,
            'super_categories' => $super_categories,
        ]);
    }

    public function create()
    {
        $super_categories = SuperCategory::all();

        return inertia()->render('Dashboard/categories/create', [
            'super_categories' => $super_categories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'required|max:255',
            'super_category_id' => 'sometimes|nullable|max:255',
        ]);

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'super_category_id' => $request->super_category_id,

        ]);

        if ($request->file('images')) {
            $category->addMedia($request->file('images'))->toMediaCollection('images');
        };

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Category created successfully',
        ]);

        return response()->json(['data' => $category,
            'redirect' => 'dashboard/categories', ]);
        // return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        $super_categories = SuperCategory::all();

        return inertia()->render('Dashboard/categories/edit', [
            'category' => $category,
            'super_categories' => $super_categories,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'required|max:255',
            'super_category_id' => 'sometimes|nullable|max:255',
        ]);

        if ($request->file('images')) {
            $category->clearMediaCollection('images')
                ->addMedia($request->file('images'))
                ->toMediaCollection('images');
        };

        $category->update($data);
        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Category updated successfully',
        ]);

        return response()->json(['data' => $category,
            'redirect' => 'dashboard/categories', ]);

        // return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Category Deleted successfully',
        ]);

        return redirect()->back();
    }
}
