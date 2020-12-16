<?php

namespace App\Http\Controllers;

use Cart;
use App\Part;
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
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => 1,
            'attributes' => [
                'slug' => $request->slug,
                'supplier' => $supplier->name,
            ],
        ]);

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $data = $request->validate(['part_type_id' => 'max:10']);
        $part = Part::find($request->id);

        $part->update($data);
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity,
                ],
            ]
        );

        return redirect()->back();
    }

    // public function remove(Request $request){
    //     \Cart::remove($request->id);
    //     return redirect()->back();
    // }

    public function clear()
    {
        \Cart::clear();

        return redirect()->route('store.index');
    }
}
