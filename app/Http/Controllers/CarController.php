<?php

namespace App\Http\Controllers;

use App\Car;
use App\Part;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return inertia()->render('Dashboard/cars/index', [
            'cars' => $cars,
        ]);
    }

    public function create()
    {
        return inertia()->render('Dashboard/cars/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|min:3',
            'model' => 'required|max:255',
            'engine' => 'required|max:255',
            'year' => 'required|max:255',
        ]);

        Car::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'engine' => $request->engine,
            'year' => $request->year,

        ]);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Car created successfully',
        ]);

        return redirect()->route('cars.index');
    }

    public function show(Car $car)
    {
        //
    }

    public function edit(Car $car)
    {
        //
    }

    public function update(Request $request, Car $car)
    {
        //
    }

    public function destroy(Car $car)
    {
        // $car->delete();

        $parts = Part::where(['car_id' => $car->id])->get();

        dd($parts);
        session()->flash('toast', [
            'type' => 'error',
            'message' => 'Car Deleted successfully',
        ]);

        return redirect()->back();
    }
}
