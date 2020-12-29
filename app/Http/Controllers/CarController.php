<?php

namespace App\Http\Controllers;

use App\Car;
use App\Brand;
use App\Http\Requests\StoreCarRequest;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('brands')->get();

        return inertia()->render('Dashboard/cars/index', [
            'cars' => $cars,
        ]);
    }

    public function create()
    {
        $brands = Brand::all();

        return inertia()->render('Dashboard/cars/create', ['brands' => $brands]);
    }

    public function store(StoreCarRequest $request)
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
            'brand_id' => $request->brand_id,

        ]);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Car created successfully',
        ]);

        return redirect()->route('cars.index');
    }

    public function edit(Car $car)
    {
        $brands = Brand::all();

        return inertia()->render('Dashboard/cars/edit', ['car' => $car,'brands' => $brands]);
    }

    public function update(StoreCarRequest $request, Car $car)
    {
        $data = $request->validated();

        $car->update($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Car updated successfully',
        ]);

        return redirect()->route('cars.index');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        session()->flash('toast', [
            'type' => 'error',
            'message' => 'Car Deleted successfully',
        ]);

        return redirect()->back();
    }
}
