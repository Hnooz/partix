<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return inertia()->render('Dashboard/brands/index', [
            'brands' => Brand::paginate(15),
        ]);
    }

    public function create()
    {
        return inertia()->render('Dashboard/brands/create');
    }

    public function show(Brand $brand)
    {
        return inertia()->render('Dashboard/brands/show', ['brand' => $brand]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
        ]);

        Brand::create($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Brand created successfully',
        ]);

        return redirect()->route('brands.index');
    }

    public function edit(Brand $brand)
    {
        return inertia()->render('Dashboard/brands/edit', ['brand' => $brand]);
    }

    public function update(Request $request, Brand $brand)
    {
        $data = $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
        ]);

        $brand->update($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Brand updated successfully',
        ]);
    }

    public function destroy(Brand $brand)
    {
        $brand->cars()->delete();

        $brand->delete();

        session()->flash('toast', [
            'type' => 'error',
            'message' => 'Brand deleted successfully',
        ]);

        return redirect()->back();
    }
}
