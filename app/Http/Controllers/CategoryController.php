<?php

namespace App\Http\Controllers;

use App\Category;
use App\SuperCategory;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $super_categories = SuperCategory::with('categories')->get();

        return inertia()->render('Dashboard/categories/index', [
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

    public function store(StoreCategoryRequest $request)
    {
        $request->validated();

        $category = Category::create([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'sale' => $request->sale,
            'super_category_id' => $request->super_category_id,
        ]);

        $request->file('images') ? $category->addMedia($request->file('images'))->toMediaCollection('images') : '';

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Category created successfully',
        ]);

        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        $super_categories = SuperCategory::all();

        return inertia()->render('Dashboard/categories/edit', [
            'category' => $category,
            'super_categories' => $super_categories,
        ]);
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
    
        if ($request->file('images')) {
            $category->clearMediaCollection('images');
            $category->addMedia($request->file('images'))->toMediaCollection('images');
        }

        $category->update($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Category updated successfully',
        ]);

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->parts()->update(['category_id' => null]);

        $category->delete();

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Category Deleted successfully',
        ]);

        return redirect()->back();
    }
}
