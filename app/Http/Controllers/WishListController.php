<?php

namespace App\Http\Controllers;

use App\Part;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function add()
    {
        $wish_list = app('wishlist');
        if ($wish_list->get(request('id')) !== null) {
            return \redirect()->back();
        } else {
            $part = Part::where('id', request('id'))->get();
            $id = request('id');
            $name = request('name');
            $price = request('oem_price');
            $qty = 1;
            $attributs = [
                $url = $part->each->append('url'),
            ];

            $wish_list->add($id, $name, $price, $qty, $attributs);

            session()->flash('toast', [
                'type' => 'success',
                'message' => 'item was added to wishlist',
            ]);

            return redirect()->back();
        }
    }

    public function remove($id)
    {
        $wish_list = app('wishlist');
        $wish_list->remove($id);
        session()->flash('toast', [
            'type' => 'error',
            'message' => 'item was removed',
        ]);

        return redirect()->back();
    }
}
