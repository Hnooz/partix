<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return inertia()->render('Dashboard/brands/index', [
            'brands' => Brand::all(),
        ]);
    }

    public function create()
    {
        return inertia()->render('Dashboard/brands/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
        ]);

        Brand::create([
            'name' => $request->name,
            'name_ar' => $request->name_ar,

        ]);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Brand created successfully',
        ]);

        return redirect()->route('brands.index');
    }

    public function edit(Brand $brand)
    {
        return inertia()->render('Dashboard/brands/edit');
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
        $brand->cars()->each(function ($car) {
            $car->delete();
        });

        $brand->delete();

        session()->flash('toast', [
            'type' => 'error',
            'message' => 'Brand deleted successfully',
        ]);
    }
}
