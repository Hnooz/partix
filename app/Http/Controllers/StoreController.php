<?php

namespace App\Http\Controllers;

use Cart;
use App\Car;
use App\Part;
use App\Category;
use App\PartType;
use App\SuperCategory;

class StoreController extends Controller
{
    public function index()
    {
        $parts = Part::all();
        
        $cars = Car::all();
        $categories = Category::all();
        $super_category = SuperCategory::all();
        $cartQuantity = Cart::getTotalQuantity();
        $cartCollection = Cart::getContent();
        
        return inertia()->render(
            'Store/Index',
            [
                'parts' => $parts,
                'categories' => $categories,
                'super_category' => $super_category,
                'cars' => $cars,
                'cartQuantity' => $cartQuantity,
                'cartCollection' => $cartCollection, ]
        );
    }

    public function items()
    {
        $parts = Part::with('category')->get();
        $cars = Car::all();
        $cartQuantity = Cart::getTotalQuantity();
        $cartCollection = Cart::getContent();

        return inertia()->render(
            'Store/Items',
            [
                'parts' => $parts,
                'cars' => $cars,
                'cartQuantity' => $cartQuantity,
                'cartCollection' => $cartCollection, ]
        );
    }

    public function details(Part $part)
    {
        $cars = Car::all();
        $cartQuantity = Cart::getTotalQuantity();
        $cartCollection = Cart::getContent();
        $cartItem = Cart::get($part->id);
        $part_type = PartType::all();
        // dd($cartItem);
        return inertia()->render('Store/ItemDetails', ['part' => $part,
            'cars' => $cars,
            'cartQuantity' => $cartQuantity,
            'cartCollection' => $cartCollection,
            'cartItem' => $cartItem,
            'part_type' => $part_type,
        ]);
    }
}
