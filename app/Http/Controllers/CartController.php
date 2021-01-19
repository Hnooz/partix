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
        $part = Part::find($request->id);
        // dd($part->append('url'));
        if ($request->part_type_id == 1) {
            if (isset($part->sale) > 0) {  // price if part has sale
                $price = $part->oem_price - (($part->sale / 100) * $part->oem_price);
            } elseif (isset($category->sale) > 0) {
                $price = $part->oem_price - (($category->sale / 100) * $part->oem_price);
            } else {
                $price = $part->oem_price;
            }
        } elseif ($request->part_type_id == 2) {
            if (isset($part->sale) > 0) {  // price if part has sale
                $price = $part->aftermarket_price - (($part->sale / 100) * $part->aftermarket_price);
            } elseif (isset($category->sale) > 0) {
                $price = $request->aftermarket_price - (($category->sale / 100) * $request->aftermarket_price);
            } else {
                $price = $request->aftermarket_price;
            }
        } else {
            if (isset($part->sale) > 0) {  // price if part has sale
                $price = $part->used_price - (($part->sale / 100) * $part->used_price);
            } elseif (isset($category->sale) > 0) {
                $price = $request->used_price - (($category->sale / 100) * $request->used_price);
            } else {
                $price = $request->used_price;
            }
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
                    'part_type_id' => $request->part_type_id,
                    'url' => $part->append('url'),
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
                    'part_type_id' => $request->part_type_id,
                    'url' => $part->append('url'),
                ],
            ]);
        }
        
        return redirect()->back();
    }

    public function update(Request $request)
    {
        // dd($request);
        $data = $request->validate(['part_type_id' => 'max:10']);
        $part = Part::find($request->id);

        // $part->update($request->only(['part_type_id']));

        $category = Category::find($part->category_id);

        if ($request->part_type_id == 1) {
            if ($part->sale > 0) {  // price if part has sale
                $price = $part->price - (($part->sale / 100) * $part->price);
            } elseif ($category->sale > 0) {
                $price = $part->price - (($category->sale / 100) * $part->price);
            } else {
                $price = $part->price;
            }
        } elseif ($request->part_type_id == 2) {
            if ($part->sale > 0) {  // price if part has sale
                $price = $part->second_price - (($part->sale / 100) * $part->second_price);
            } elseif ($category->sale > 0) {  //price if category has sale
                $price = $part->second_price - (($category->sale / 100) * $part->second_price);
            } else {   //original price if there are no sale in part or category
                $price = $part->second_price;
            }
        } else {
            if (isset($part->sale) > 0) {  // price if part has sale
                $price = $part->used_price - (($part->sale / 100) * $part->used_price);
            } elseif (isset($category->sale) > 0) {
                $price = $request->used_price - (($category->sale / 100) * $request->used_price);
            } else {
                $price = $request->used_price;
            }
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
