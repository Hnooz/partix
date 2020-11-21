<?php

namespace App\Http\Controllers;

use App\Part;
use App\Exports\PartsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PartController extends Controller
{
    public function index()
    {
        $parts = Part::all();
        return inertia()->render('Dashboard/parts/index',[
            'parts' => $parts
        ]);
    }

    
    public function create()
    {
        return inertia()->render('Dashboard/parts/create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name'      =>  'required|min:4',
            'number'     =>  'required|unique:parts|max:255',
            'comment'     =>  'required|max:255',
            'price'     =>  'required|max:255',
       ]);

       Part::create([
           'name' => $request->name,
           'number' => $request->number,
           'comment' => $request->comment,
           'price' => $request->price,

       ]);

       session()->flash('toast', [
        'type' => 'success',
        'message' => 'Part created successfully'
        ]);

            return redirect()->route('parts.index');
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy(Part $part)
    {
        $part->delete();
        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Part Deleted successfully'
        ]);

      return redirect()->back();
    }
}
