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
        return inertia()->render(
            'Store/carts/index',
            [
                'cartCollection' => Cart::getContent(),
                'cartQuantity' => Cart::getTotalQuantity(),
                'cartTotalPrice' => Cart::getTotal(),
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => ['required'],
            'name' => ['required'],
            'slug' => ['required'],
            'part_type_id' => ['required'],
            'url' => ['required'],
                
        ]);
        $supplier = Supplier::find($request->supplier_id);
        
        $category = Category::find($request->category_id);

        $part = Part::find($request->id);

        if ($request->part_type_id == 1) {
            // price if part has sale
            if (isset($part->sale) > 0) {
                $price = $part->oem_price - (($part->sale / 100) * $part->oem_price);
            } elseif (isset($category->sale) > 0) {
                $price = $part->oem_price - (($category->sale / 100) * $part->oem_price);
            } else {
                $price = $part->oem_price;
            }
        } elseif ($request->part_type_id == 2) {
            // price if part has sale
            if (isset($part->sale) > 0) {
                $price = $part->aftermarket_price - (($part->sale / 100) * $part->aftermarket_price);
            } elseif (isset($category->sale) > 0) {
                $price = $request->aftermarket_price - (($category->sale / 100) * $request->aftermarket_price);
            } else {
                $price = $request->aftermarket_price;
            }
        } else {
            // price if part has sale
            if (isset($part->sale) > 0) {
                $price = $part->used_price - (($part->sale / 100) * $part->used_price);
            } elseif (isset($category->sale) > 0) {
                $price = $request->used_price - (($category->sale / 100) * $request->used_price);
            } else {
                $price = $request->used_price;
            }
        }
        if ($request->quantity) {
            Cart::add([
                'id' => $request->id.$request->name.$request->part_type_id,
                'name' => $request->name,
                'price' => $price,
                'quantity' => $request->quantity,
                'attributes' => [
                    'partId' => $part->id,
                    'slug' => $request->slug,
                    'supplier' => isset($supplier->name),
                    'part_type_id' => $request->part_type_id,
                    'url' => $part->append('url'),
                ],
            ]);
        } else {
            Cart::add([
                'id' => $request->id.$request->name.$request->part_type_id,
                'name' => $request->name,
                'price' => $price,
                'quantity' => 1,
                'attributes' => [
                    'partId' => $part->id,
                    'slug' => $request->slug,
                    'supplier' => isset($supplier->name),
                    'part_type_id' => $request->part_type_id,
                    'url' => $part->append('url'),
                ],
            ]);
        }
        session()->flash('toast', [
            'type' => 'success',
            'message' => 'item was added to cart',
        ]);

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $category = Category::find($request->category_id);

        if ($request->part_type_id == 1) {
            // price if part has sale
            if (isset($part->sale) > 0) {
                $price = $request->oem_price - (($request->sale / 100) * $request->oem_price);
            } elseif (isset($category->sale) > 0) {
                $price = $request->oem_price - (($category->sale / 100) * $request->oem_price);
            } else {
                $price = $part->oem_price;
            }
        } elseif ($request->part_type_id == 2) {
            // price if part has sale
            if (isset($request->sale) > 0) {
                $price = $request->aftermarket_price - (($request->sale / 100) * $request->aftermarket_price);
            } elseif (isset($category->sale) > 0) {
                $price = $request->aftermarket_price - (($category->sale / 100) * $request->aftermarket_price);
            } else {
                $price = $request->aftermarket_price;
            }
        } else {
            // price if part has sale
            if (isset($request->sale) > 0) {
                $price = $request->used_price - (($request->sale / 100) * $request->used_price);
            } elseif (isset($category->sale) > 0) {
                $price = $request->used_price - (($category->sale / 100) * $request->used_price);
            } else {
                $price = $request->used_price;
            }
        }
        Cart::update(
            $request->id,
            [
                'price' => $price,
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity,
                ],
            ]
        );

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'item was updated',
        ]);

        return redirect()->back();
    }

    public function remove($id)
    {
        Cart::remove($id);
        session()->flash('toast', [
            'type' => 'error',
            'message' => 'item was removed',
        ]);

        return redirect()->back();
    }

    public function clear()
    {
        Cart::clear();

        session()->flash('toast', [
            'type' => 'error',
            'message' => 'cart was cleared successfully',
        ]);

        return redirect()->route('store.index');
    }
}
