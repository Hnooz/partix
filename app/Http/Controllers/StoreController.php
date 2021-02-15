<?php

namespace App\Http\Controllers;

use Cart;
use App\Part;
use App\Category;
use App\SuperCategory;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $super_category = SuperCategory::with('categories')->get();

        return inertia()->render(
            'Store/Index',
            [
        
<<<<<<< HEAD
                'parts' => Part::take(10)->get(),
=======
                'parts' => Part::take($this->PAGINATION_SIZE)->get(),
>>>>>>> d25c71f3eb7d93366f63dc66203ef2ce78e27497
                'categories' => Category::all(),
                'super_category' => $super_category,
            ]
        );
    }

    public function items()
    {
        $parts = Part::with('category')->paginate($this->PAGINATION_SIZE);

        return inertia()->render(
            'Store/Items',
            [
                'parts' => $parts,
            ]
        );
    }

    public function categoryItems(Category $category)
    {
        $parts = Part::with('category')->where('category_id', $category->id)->paginate($this->PAGINATION_SIZE);

        return inertia()->render(
            'Store/categoryItem',
            [
                'parts' => $parts,
                'category' => $category,
            ]
        );
    }

    public function details(Part $part)
    {
        $cartItem = Cart::get($part->id.$part->name.$part->part_type_id);
        $latest_category = Category::latest()->limit(3)->get();

        return inertia()->render('Store/ItemDetails', [
            'part' => $part,
            'cartItem' => $cartItem,
            'latest_category' => $latest_category,
        ]);
    }

    public function search(Request $request)
    {
        request()->validate([
            'name' => 'required|min:1',
        ]);

        $part = Part::where('name', 'LIKE', "%{$request->name}%")
            ->orWhere('number', 'LIKE', "%{$request->name}%")
            ->orWhere('name_ar', $request->name)
            ->take(5)
            ->get();

        return response()->json(['data' => $part]);
    }
}
