<?php

namespace App\Http\Controllers;

use App\Car;
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
        $cars = Car::all();
        return inertia()->render('Dashboard/parts/create', ['cars' => $cars]);
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name'      =>  'required|min:4',
            'number'     =>  'required|unique:parts|max:255',
            'description'     =>  'required|max:255',
            'price'     =>  'required|max:255',
            'slug'     =>  'required|max:255',
            'car_id' => 'required|max:255',
            // 'image' => 'sometimes'
       ]);

     $part =  Part::create([
           'name'   => $request->name,
           'number' => $request->number,
           'description' => $request->description,
           'price'  => $request->price,
           'slug'   => $request->slug,
           'car_id' =>$request->car_id ,
           'supplier_id' => 1

       ]);

        // dd($request->hasFile('image'));
       if ($request->hasFile('image')) {
        $part->addMedia($request->file('image'))
        ->toMediaCollection('images');
        };

       session()->flash('toast', [
        'type' => 'success',
        'message' => 'Part created successfully'
        ]);

            return redirect()->route('parts.index');
    }

    
    public function show(Part $part)
    {
        //
    }

   
    public function edit(Part $part)
    {
        $cars = Car::all();
        return inertia()->render('Dashboard/parts/edit', ['part' => $part, 'cars' => $cars]);
    }

   
    public function update(Request $request, Part $part)
    {
       $data = $request->validate([
            'name'      =>  'required|min:4',
            'number'     =>  'required|max:255',
            'description'     =>  'required|max:255',
            'price'     =>  'required|max:255',
            'slug'     =>  'required|max:255',
            'car_id' => 'required|max:255',
       ]);

       $part->update($data);

       session()->flash('toast', [
        'type' => 'success',
        'message' => 'Part Updated successfully'
        ]);

        return redirect()->route('parts.index');

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
