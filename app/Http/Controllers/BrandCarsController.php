<?php

namespace App\Http\Controllers;

use App\Car;
use App\Brand;
use App\Http\Requests\StoreCarRequest;

class BrandCarsController extends Controller
{
    public function show(Brand $brand)
    {
        return inertia()->render('Dashboard/brands/createCar', ['brand' => $brand]);
    }

    public function store(StoreCarRequest $request, Brand $brand)
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

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Car Created successfully',
        ]);

        return redirect()->route('brands.index');
    }
}
