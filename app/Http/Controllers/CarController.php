<?php

namespace App\Http\Controllers;

use App\Car;
use App\Brand;
use Illuminate\Http\Request;
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

    public function update(Request $request, Car $car)
    {
        $data = $request->validate([
            'brand' => 'required|min:3',
            'model' => 'required|max:255',
            'engine' => 'required|max:255',
            'year' => 'required|max:255',
            'brand_id' => 'required|max:255',
        ]);

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
