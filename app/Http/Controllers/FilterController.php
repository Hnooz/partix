<?php

namespace App\Http\Controllers;

use Cart;
use App\Car;
use App\Part;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function fetchBrands()
    {
        $brands = Car::all();

        return response()->json($brands);
    }

    public function fetchModels(Request $request)
    {
        $models = Car::where('id', $request->brand_id)->get();

        return response()->json($models);
    }

    public function fetchYears(Request $request)
    {
        $years = Car::where('id', $request->model_id)->get();

        return response()->json($years);
    }

    public function fetchEngines(Request $request)
    {
        $engines = Car::where('id', $request->year_id)->get();

        return response()->json($engines);
    }

    public function getFilteredParts($id)
    {
        $cars = Car::all();
        $cartQuantity = Cart::getTotalQuantity();
        $cartCollection = Cart::getContent();
        $parts = Part::where('car_id', $id)->get();

        return inertia()->render(
            'Store/filteredPart',
            [
                'parts' => $parts,
                'cars' => $cars,
                'cartQuantity' => $cartQuantity,
                'cartCollection' => $cartCollection, ]
        );
    }

    public function filteredParts(Request $request)
    {
        return response()->json(['redirect' => 'filtered_part/'.$request->car_id]);
    }
}
