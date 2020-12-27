<?php

namespace App\Http\Controllers;

use Cart;
use App\Car;
use App\Part;
use App\Brand;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function fetchBrands()
    {
        $brands = Brand::all();

        return response()->json($brands);
    }

    public function fetchModels(Request $request)
    {
        $models = Car::where('brand_id', $request->brand_id)->get();

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
        $cars = Car::find($id);
        $cartQuantity = Cart::getTotalQuantity();
        $cartCollection = Cart::getContent();
        $cartTotalPrice = Cart::getTotal();
        $parts = Part::with('cars')->where('id', $id)->get();

        return inertia()->render(
            'Store/filteredPart',
            [
                'parts' => $parts,
                'cars' => $cars->parts,
                'cartQuantity' => $cartQuantity,
                'cartCollection' => $cartCollection,
                'cartTotalPrice' => $cartTotalPrice,
            ]
        );
    }

    public function filteredParts(Request $request)
    {
        return response()->json(['redirect' => '/store/filtered_part/'.$request->car_id]);
    }
}
