<?php

namespace App\Http\Controllers;

use App\Car;
use App\Part;
use App\Category;
use App\PartType;
use App\Supplier;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index()
    {
        $parts = Part::all();
        // dd($parts);
        return inertia()->render('Dashboard/parts/index', [
            'parts' => $parts,
        ]);
    }

    public function create()
    {
        $cars = Car::all();
        $categories = Category::all();
        $suppliers = Supplier::all();
        $part_types = PartType::all();

        return inertia()->render('Dashboard/parts/create', [
            'cars' => $cars,
            'categories' => $categories,
            'suppliers' => $suppliers,
            'part_types' => $part_types,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:4',
            'number' => 'required|unique:parts|max:255',
            'description' => 'required|max:255|min:45',
            'price' => 'required|max:255',
            'second_price' => 'required|max:255',
            'slug' => 'required|max:255',
            'car_id' => 'required|max:255',
            'category_id' => 'required|max:255',
            'supplier_id' => 'required|max:255',
            'part_type_id' => 'required|max:255',
        ]);
        // \dd($data);
        $part = Part::create([
            'name' => $request->name,
            'number' => $request->number,
            'description' => $request->description,
            'price' => $request->price,
            'second_price' => $request->second_price,
            'slug' => $request->slug,
            'car_id' => $request->car_id,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'part_type_id' => $request->part_type_id,
        ]);

        if ($request->file('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $part->addMedia($image)->toMediaCollection('images');
            }
        };

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Part created successfully',
        ]);

        return response()->json(['data' => $part,
            'redirect' => 'dashboard/parts', ]);
    }
   
    public function edit(Part $part)
    {
        $cars = Car::all();
        $categories = Category::all();
        $suppliers = Supplier::all();
        $part_types = PartType::all();

        return inertia()->render('Dashboard/parts/edit', [
            'part' => $part, 'cars' => $cars,
            'categories' => $categories, 'suppliers' => $suppliers,
            'part_types' => $part_types,
        ]);
    }

    public function update(Request $request, Part $part)
    {
        // dd($request);
        // dd(true);
        $data = $request->validate([
            'name' => 'required|min:4',
            'number' => 'required|max:255',
            'description' => 'required|max:255|min:45',
            'price' => 'required|max:255',
            'second_price' => 'required|max:255',
            'slug' => 'required|max:255',
            'car_id' => 'required|max:255',
            'category_id' => 'required|max:255',
            'supplier_id' => 'required|max:255',
            'part_type_id' => 'required|max:255',
        ]);
        // dd($data);
        $part->clearMediaCollection('images');
        if ($request->file('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $part->addMedia($image)
                    ->toMediaCollection('images');
            }
        };
        $part->update($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Part Updated successfully',
        ]);

        return response()->json(['data' => $part,
            'redirect' => 'dashboard/parts', ]);

        // return redirect()->route('parts.index');
    }

    public function destroy(Part $part)
    {
        $part->delete();
        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Part Deleted successfully',
        ]);

        return redirect()->back();
    }
}
