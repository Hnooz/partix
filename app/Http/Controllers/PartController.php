<?php

namespace App\Http\Controllers;

use App\Car;
use App\Part;
use App\Brand;
use App\Category;
use App\PartType;
use App\Supplier;
use App\Http\Requests\StorePartRequest;

class PartController extends Controller
{
    public function index()
    {
        $parts = (new Part)->newQuery();
        
        if (request()->has('latest')) {
            $parts->orderBy('id', 'desc');
        }
        if (request()->has('a')) {
            $parts->orderBy('name');
        }
        if (request()->has('z')) {
            $parts->orderBy('name', 'desc');
        }
        if (request()->has('oldest')) {
            $parts->orderBy('id');
        } else {
            $parts->orderBy('id');
        }

        return inertia()->render('Dashboard/parts/index', [
            'parts' => $parts->get(),
        ]);
    }

    public function create()
    {
        $cars = Car::all();
        $brands = Brand::all();
        $categories = Category::all();
        $suppliers = Supplier::all();
        $part_types = PartType::all();

        return inertia()->render('Dashboard/parts/create', [
            'cars' => $cars,
            'categories' => $categories,
            'suppliers' => $suppliers,
            'part_types' => $part_types,
            'brands' => $brands,
        ]);
    }

    public function show($slug)
    {
        $part = Part::with('supplier')->where('slug', $slug)->first();
       
        return inertia()->render('Dashboard/parts/show', ['part' => $part]);
    }

    public function store(StorePartRequest $request)
    {
        $data = $request->validated();

        $part = Part::create([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'number' => $request->number,
            'description' => $request->description,
            'description_ar' => $request->description_ar,
            'oem_price' => $request->oem_price,
            'aftermarket_price' => $request->aftermarket_price,
            'used_price' => $request->used_price,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'part_type_id' => $request->part_type_id,
            'sale' => $request->sale,
        ]);

        if ($request->filled('cars')) {
            $part->cars()->attach(json_decode($data['cars']));
        }

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

        return redirect()->route('parts.index');
    }
   
    public function edit(Part $part)
    {
        $cars = Car::all();
        $categories = Category::all();
        $suppliers = Supplier::all();
        $part_types = PartType::all();
        // dd($part->with('cars')->get());
        return inertia()->render('Dashboard/parts/edit', [
            'part' => $part, 'cars' => $cars,
            'categories' => $categories, 'suppliers' => $suppliers,
            'part_types' => $part_types,
        ]);
    }

    public function update(StorePartRequest $request, Part $part)
    {
        $data = $request->validated();

        // dd($data);
        $part->update($request->only([
            'name',
            'name_ar',
            'number',
            'description',
            'description_ar',
            'oem_price',
            'aftermarket_price',
            'used_price',
            'category_id',
            'supplier_id',
            'part_type_id',
            'sale',
        ]));
        
        if ($request->filled('cars')) {
            $part->cars()->sync(json_decode($data['cars']));
        }
        
        if ($request->file('images')) {
            $part->clearMediaCollection('images');
            $images = $request->file('images');
            foreach ($images as $image) {
                $part->addMedia($image)->toMediaCollection('images');
            }
        };

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Part Updated successfully',
        ]);

        return redirect()->route('parts.index');
    }

    public function destroy(Part $part)
    {
        $part->delete();
        session()->flash('toast', [
            'type' => 'error',
            'message' => 'Part Deleted successfully',
        ]);

        return redirect()->back();
    }
}
