<?php

namespace App\Http\Controllers;

use Cart;
use App\Part;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartCollection = Cart::getContent();
        $cartQuantity = Cart::getTotalQuantity();

        return inertia()->render(
            'Store/carts/index',
            [
                'cartCollection' => $cartCollection,
                'cartQuantity' => $cartQuantity, ]
        );
    }

    public function store(Request $request)
    {
        // dd($request);
        // add the product to cart
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => 1,
            'attributes' => [
                'slug' => $request->slug,
            ],
            // 'associatedModel' => Part,
        ]);
        // dd($cart);
        return redirect()->back();
    }

    public function update(Request $request)
    {
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
