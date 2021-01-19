<?php

namespace App\Http\Controllers;

use App\Car;
use App\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCarRequest;

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

    public function show(Brand $brand)
    {
        $cars = Car::where('brand_id', $brand->id)->get();

        return inertia()->render('Dashboard/brands/show', ['cars' => $cars, 'brand' => $brand]);
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
        $brand->cars()->each(function ($car) {
            $car->delete();
        });

        $brand->delete();

        session()->flash('toast', [
            'type' => 'error',
            'message' => 'Brand deleted successfully',
        ]);
    }

    // cars belongs to brand

    public function brandCars(Brand $brand)
    {
        return inertia()->render('Dashboard/brands/createCar', ['brand' => $brand]);
    }

    public function storeBrandCars(StoreCarRequest $request, Brand $brand)
    {
        $request->validated();
        Car::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'engine' => $request->engine,
            'brand_ar' => $request->brand_ar,
            'model_ar' => $request->model_ar,
            'engine_ar' => $request->engine_ar,
            'year' => $request->year,
            'brand_id' => $brand->id,
        ]);

        return redirect()->route('brands.index');
    }
}
