<?php

namespace App\Http\Controllers;

use Cart;
use App\Part;
use App\Category;
use App\Supplier;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartCollection = Cart::getContent();
        $cartQuantity = Cart::getTotalQuantity();
        $cartTotalPrice = Cart::getTotal();

        return inertia()->render(
            'Store/carts/index',
            [
                'cartCollection' => $cartCollection,
                'cartQuantity' => $cartQuantity,
                'cartTotalPrice' => $cartTotalPrice,
            ]
        );
    }

    public function store(Request $request)
    {
        $supplier = Supplier::find($request->supplier_id);
        
        $category = Category::find($request->category_id);
        $part = Part::where('id', $request->id)->get();
        if ($part[0]->type->name == 'oem') {
            if (isset($category->sale) > 0) {
                $price = $request->price - (($category->sale / 100) * $request->price);
            } else {
                $price = $request->price - (($request->sale / 100) * $request->price);
            }
        } elseif ($part[0]->type->name == 'aftermarket') {
            if ($category->sale > 0) {
                $price = $request->second_price - (($category->sale / 100) * $request->second_price);
            } else {
                $price = $request->second_price - (($request->sale / 100) * $request->second_price);
            }
        } else {
            $price = 0;
        }
        if ($request->quantity) {
            Cart::add([
                'id' => $request->id,
                'name' => $request->name,
                'price' => $price,
                'quantity' => $request->quantity,
                'attributes' => [
                    'slug' => $request->slug,
                    'supplier' => isset($supplier->name),
                ],
            ]);
        } else {
            Cart::add([
                'id' => $request->id,
                'name' => $request->name,
                'price' => $price,
                'quantity' => 1,
                'attributes' => [
                    'slug' => $request->slug,
                    'supplier' => isset($supplier->name),
                ],
            ]);
        }
        
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $data = $request->validate(['part_type_id' => 'max:10']);
        $part = Part::find($request->id);

        $part->update($data);

        $category = Category::find($part->category_id);

        if ($part->type->name == 'oem') {
            if ($category->sale > 0) {
                $price = $part->price - (($category->sale / 100) * $part->price);
            } else {
                $price = $part->price - (($part->sale / 100) * $part->price);
            }
        } elseif ($part->type->name == 'aftermarket') {
            if ($category->sale > 0) {
                $price = $part->second_price - (($category->sale / 100) * $part->second_price);
            } else {
                $price = $part->second_price - (($part->sale / 100) * $part->second_price);
            }
        } else {
            $price = 0;
        }

        \Cart::update(
            $request->id,
            [
                'price' => $price,
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity,
                ],
            ]
        );

        return redirect()->back();
    }

    public function remove($id)
    {
        \Cart::remove($id);
        session()->flash('toast', [
            'type' => 'error',
            'message' => 'item was removed',
        ]);

        return redirect()->back();
    }

    public function clear()
    {
        \Cart::clear();

        session()->flash('toast', [
            'type' => 'error',
            'message' => `cart was cleared successfuly`,
        ]);

        return redirect()->route('store.index');
    }
}
