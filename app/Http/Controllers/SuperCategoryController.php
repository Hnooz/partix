<?php

namespace App\Http\Controllers;

use App\SuperCategory;
use Illuminate\Http\Request;

class SuperCategoryController extends Controller
{
    public function index()
    {
        $super_categories = SuperCategory::all();

        return inertia()->render('Dashboard/super_categories/index', [
            'super_categories' => $super_categories,
        ]);
    }

    public function create()
    {
        return inertia()->render('Dashboard/super_categories/create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
        ]);

        $super_category = SuperCategory::create($data);

        if ($request->file('images')) {
            $super_category->addMedia($request->file('images'))->toMediaCollection('images');
        };

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Super category created successfully',
        ]);

        return response()->json([
            'data' => $super_category,
            'redirect' => 'dashboard/super_categories',
        ]);
    }

    public function edit(SuperCategory $superCategory)
    {
        return inertia()->render('Dashboard/super_categories/edit', ['superCategory' => $superCategory]);
    }

    public function update(Request $request, SuperCategory $superCategory)
    {
        $data = $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
        ]);
        
        $superCategory->update($data);
        
        if ($request->file('images')) {
            $superCategory->clearMediaCollection('images');
            $superCategory->addMedia($request->file('images'))->toMediaCollection('images');
        };

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Super category updated successfully',
        ]);

        return response()->json(['data' => $superCategory,
            'redirect' => 'dashboard/super_categories', ]);
    }

    public function destroy(SuperCategory $superCategory)
    {
        $superCategory->categories()->each(function ($category) {
            $category->delete();
        });
        $superCategory->delete();

        session()->flash('toast', [
            'type' => 'error',
            'message' => 'Super category deleted successfully',
        ]);

        return redirect()->back();
    }
}
