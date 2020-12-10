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

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required']);

        SuperCategory::create($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Super category created successfully',
        ]);

        return redirect()->back();
    }

    public function update(Request $request, SuperCategory $superCategory)
    {
        $data = $request->validate(['name' => 'required']);
        
        $superCategory->update($data);
        
        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Super category updated successfully',
        ]);

        return redirect()->back();
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
