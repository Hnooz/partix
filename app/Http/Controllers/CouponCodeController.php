<?php

namespace App\Http\Controllers;

use App\CouponCode;
use App\DiscountType;
use Illuminate\Http\Request;

class CouponCodeController extends Controller
{
    public function index()
    {
        $coupons = CouponCode::all();
        $descountType = DiscountType::all();
        return inertia()->render(
            'Dashboard/coupons/index',
            [
            'coupons' => $coupons,
            'descountType' => $descountType
        ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required',
            'expiration_at' => 'required',
            'descount_type_id' => 'required',
        ]);

        CouponCode::create([
            'value' => $request->value,
            'expiration_at' => $request->expiration_at,
            'descount_type_id' => $request->descount_type_id,
        ]);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'coupon created successfully'
        ]);

        return redirect()->back();
    }

    public function destroy(CouponCode $coupon)
    {
        $coupon->delete();

        session()->flash('toast', [
            'type' => 'error',
            'message' => 'coupon deleted successfully'
        ]);

        return redirect()->back();
    }
}
