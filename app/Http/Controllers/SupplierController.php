<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();

        return inertia()->render('Dashboard/suppliers/index', [
            'suppliers' => $suppliers,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
        ]);

        Supplier::create([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
        ]);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Supplier created successfully',
        ]);

        return redirect()->route('suppliers.index');
    }

    public function update(Request $request, Supplier $supplier)
    {
        $data = $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
        ]);
        
        $supplier->update($data);
        
        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Supplier updated successfully',
        ]);

        return redirect()->back();
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->part()->each(function ($part) {
            $part->delete();
        });
        $supplier->delete();

        session()->flash('toast', [
            'type' => 'error',
            'message' => 'Supplier deleted successfully',
        ]);

        return redirect()->back();
    }
}
