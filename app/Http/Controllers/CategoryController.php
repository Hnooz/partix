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

        return inertia()->render('Dashboard/categories/index', [
            'categories' => $categories,
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
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,

        ]);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Category created successfully',
        ]);

        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
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
