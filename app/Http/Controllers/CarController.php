<?php

namespace App\Http\Controllers;

use App\Car;
use App\Brand;
use App\Http\Requests\StoreCarRequest;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('brands')->paginate(15);

        return inertia()->render('Dashboard/cars/index', [
            'cars' => $cars,
        ]);
    }

    public function create()
    {
        return inertia()->render('Dashboard/cars/create', ['brands' => Brand::all()]);
    }

    public function store(StoreCarRequest $request)
    {
        $data = $request->validated();

        Car::create($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Car created successfully',
        ]);

        return redirect()->route('cars.index');
    }

    public function edit(Car $car)
    {
        return inertia()->render('Dashboard/cars/edit', [
            'car' => $car,
            'brands' => Brand::all(),
        ]);
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
