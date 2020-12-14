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
        $data = $request->validate(['name' => 'required']);

        $super_category = SuperCategory::create($data);

        if ($request->file('images')) {
            $super_category->addMedia($request->file('images'))->toMediaCollection('images');
        };

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Super category created successfully',
        ]);

        return response()->json(['data' => $super_category,
            'redirect' => 'dashboard/super_categories', ]);

        // return redirect()->back();
    }

    public function edit(SuperCategory $superCategory)
    {
        return inertia()->render('Dashboard/super_categories/edit', ['superCategory' => $superCategory]);
    }

    public function update(Request $request, SuperCategory $superCategory)
    {
        $data = $request->validate(['name' => 'required']);
        
        $superCategory->update($data);
        $superCategory->clearMediaCollection('images');
        if ($request->file('images')) {
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
        $superCategory->delete();

        session()->flash('toast', [
            'type' => 'error',
            'message' => 'Super category deleted successfully',
        ]);

        return redirect()->back();
    }
}