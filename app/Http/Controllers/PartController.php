<?php

namespace App\Http\Controllers;

use App\Car;
use App\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index()
    {
        return inertia()->render('Dashboard/parts/index', [
            'parts' => Part::all()
        ]);
    }

    
    public function create()
    {
        return inertia()->render('Dashboard/parts/create', [
            'cars' => Car::all()
        ]);
    }

   
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      =>  'required|min:4',
            'number'     =>  'required|unique:parts|max:255',
            'description'     =>  'required|max:255',
            'price'     =>  'required|max:255',
            'slug'     =>  'required|max:255',
            'car_id' => 'required|max:255',
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

        if ($request->hasFile('image')) {
            $part->addMedia($request->file('image'))->toMediaCollection('images');
        };

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Part created successfully'
        ]);

        return redirect()->route('parts.index');
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
