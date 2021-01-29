<?php

namespace App\Http\Controllers;

use Cart;
use App\Car;
use App\Part;
use App\Category;
use App\PartType;
use App\SuperCategory;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $wish_list = app('wishlist');
        $super_category = SuperCategory::with('categories')->get();
        $wishlistQuantity = $wish_list->getTotalQuantity();
        $wishlistContent = $wish_list->getContent();

        return inertia()->render(
            'Store/Index',
            [
                'parts' => Part::all(),
                'categories' => Category::all(),
                'super_category' => $super_category,
                'cartQuantity' => Cart::getTotalQuantity(),
                'cartTotalPrice' => Cart::getTotal(),
                'cartCollection' => Cart::getContent(),
                'wishlistQuantity' => $wishlistQuantity,
                'wishlistContent' => $wishlistContent,
            ]
        );
    }

    public function items()
    {
        $wish_list = app('wishlist');
        $parts = Part::with('category')->get();
        $wishlistQuantity = $wish_list->getTotalQuantity();
        $wishlistContent = $wish_list->getContent();

        return inertia()->render(
            'Store/Items',
            [
                'parts' => $parts,
                'cars' => Car::all(),
                'cartQuantity' => Cart::getTotalQuantity(),
                'cartTotalPrice' => Cart::getTotal(),
                'cartCollection' => Cart::getContent(),
                'wishlistQuantity' => $wishlistQuantity,
                'wishlistContent' => $wishlistContent,
            ]
        );
    }

    public function categoryItems(Category $category)
    {
        $wish_list = app('wishlist');
        $parts = Part::with('category')->where('category_id', $category->id)->paginate(10);
        $wishlistQuantity = $wish_list->getTotalQuantity();
        $wishlistContent = $wish_list->getContent();

        return inertia()->render(
            'Store/categoryItem',
            [
                'parts' => $parts,
                'cars' => Car::all(),
                'cartQuantity' => Cart::getTotalQuantity(),
                'cartTotalPrice' => Cart::getTotal(),
                'cartCollection' => Cart::getContent(),
                'category' => $category,
                'wishlistQuantity' => $wishlistQuantity,
                'wishlistContent' => $wishlistContent,
            ]
        );
    }

    public function details(Part $part)
    {
        $wish_list = app('wishlist');
        $cartItem = Cart::get($part->id.$part->name.$part->part_type_id);
        $latest_category = Category::latest()->limit(3)->get();
        $wishlistQuantity = $wish_list->getTotalQuantity();
        $wishlistContent = $wish_list->getContent();

        return inertia()->render('Store/ItemDetails', [
            'part' => $part,
            'cars' => Car::all(),
            'cartQuantity' => Cart::getTotalQuantity(),
            'cartTotalPrice' => Cart::getTotal(),
            'cartCollection' => Cart::getContent(),
            'cartItem' => $cartItem,
            'part_type' => PartType::all(),
            'latest_category' => $latest_category,
            'wishlistQuantity' => $wishlistQuantity,
            'wishlistContent' => $wishlistContent,
        ]);
    }

    public function search(Request $request)
    {
        $part = Part::where('name', $request->name)->orWhere('number', $request->name)->orWhere('name_ar', $request->name)->get();

        return response()->json(['data' => $part, 'redirect' => '/store/details/']);
    }
}
