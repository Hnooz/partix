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
        $cartTotalPrice = Cart::getTotal();
        
        return inertia()->render(
            'Store/Index',
            [
                'parts' => $parts,
                'categories' => $categories,
                'super_category' => $super_category,
                'cars' => $cars,
                'cartQuantity' => $cartQuantity,
                'cartTotalPrice' => $cartTotalPrice,
                'cartCollection' => $cartCollection, ]
        );
    }

    public function items()
    {
        $parts = Part::with('category')->get();
        $cars = Car::all();
        $cartQuantity = Cart::getTotalQuantity();
        $cartCollection = Cart::getContent();
        $cartTotalPrice = Cart::getTotal();

        return inertia()->render(
            'Store/Items',
            [
                'parts' => $parts,
                'cars' => $cars,
                'cartQuantity' => $cartQuantity,
                'cartTotalPrice' => $cartTotalPrice,
                'cartCollection' => $cartCollection, ]
        );
    }

    public function category()
    {
        return inertia()->render('Store/Categories');
    }
    public function details(Part $part)
    {
        $cars = Car::all();
        $cartQuantity = Cart::getTotalQuantity();
        $cartTotalPrice = Cart::getTotal();
        $cartCollection = Cart::getContent();
        $cartItem = Cart::get($part->id);
        $part_type = PartType::all();
        $latest_category = Category::latest()->limit(3)->get();
        // dd($cat);
        return inertia()->render('Store/ItemDetails', ['part' => $part,
            'cars' => $cars,
            'cartQuantity' => $cartQuantity,
            'cartCollection' => $cartCollection,
            'cartTotalPrice' => $cartTotalPrice,
            'cartItem' => $cartItem,
            'part_type' => $part_type,
            'latest_category' => $latest_category,
        ]);
    }
}
