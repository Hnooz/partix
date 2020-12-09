<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();

        return inertia()->render('Dashboard/suppliers/index', [
            'suppliers' => $suppliers,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required']);

        Supplier::create($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Supplier created successfully',
        ]);

        return redirect()->back();
    }

    public function update(Request $request, Supplier $supplier)
    {
        $data = $request->validate(['name' => 'required']);
        
        $supplier->update($data);
        
        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Supplier updated successfully',
        ]);

        return redirect()->back();
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        session()->flash('toast', [
            'type' => 'error',
            'message' => 'Supplier deleted successfully',
        ]);

        return redirect()->back();
    }
}
