<?php

namespace App\Http\Controllers;

use App\CouponCode;
use App\DiscountType;
use App\Http\Requests\StoreCouponCodeRequest;

class CouponCodeController extends Controller
{
    public function index()
    {
        return inertia()->render(
            'Dashboard/coupons/index',
            ['coupons' => CouponCode::all(),]
        );
    }

    public function create()
    {
        return inertia()->render('Dashboard/coupons/create', ['descountType' => DiscountType::all()]);
    }

    public function store(StoreCouponCodeRequest $request)
    {
        $data = $request->validated();

        CouponCode::create($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'coupon created successfully',
        ]);

        return redirect()->route('coupons.index');
    }

    public function edit(CouponCode $coupon)
    {
        return inertia()->render('Dashboard/coupons/edit', [
            'descountType' => DiscountType::all(),
            'coupon' => $coupon,
        ]);
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
