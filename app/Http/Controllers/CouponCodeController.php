<?php

namespace App\Http\Controllers;

use App\CouponCode;
use App\DiscountType;
use App\Http\Requests\StoreCouponCodeRequest;

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
                'descountType' => $descountType,
            ]
        );
    }

    public function create()
    {
        $descountType = DiscountType::all();

        return inertia()->render('Dashboard/coupons/create', ['descountType' => $descountType,]);
    }

    public function store(StoreCouponCodeRequest $request)
    {
        $request->validated();

        CouponCode::create([
            'name' => $request->name,
            'value' => $request->value,
            'quantity' => $request->quantity,
            'expiration_at' => $request->expiration_at,
            'descount_type_id' => $request->descount_type_id,
        ]);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'coupon created successfully',
        ]);

        return redirect()->route('coupons.index');
    }

    public function edit(CouponCode $coupon)
    {
        $descountType = DiscountType::all();

        return inertia()->render('Dashboard/coupons/edit', ['descountType' => $descountType,'coupon' => $coupon]);
    }

    public function update(StoreCouponCodeRequest $request, CouponCode $coupon)
    {
        $data = $request->validated();

        $coupon->update($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'coupon updated successfully',
        ]);

        return redirect()->route('coupons.index');
    }

    public function destroy(CouponCode $coupon)
    {
        $coupon->delete();

        session()->flash('toast', [
            'type' => 'error',
            'message' => 'coupon deleted successfully',
        ]);

        return redirect()->back();
    }
}
