<?php

namespace App\Http\Controllers;

use App\Car;
use App\Part;
use App\Category;
use App\PartType;
use App\Supplier;
use Illuminate\Support\Arr;
use App\Http\Requests\StorePartRequest;

class PartController extends Controller
{
    public function index()
    {
        $parts = (new Part)->newQuery();
        
        if (request()->has('latest')) {
            $parts->orderBy('created_at', 'desc');
        }
        if (request()->has('a')) {
            $parts->orderBy('name');
        }
        if (request()->has('z')) {
            $parts->orderBy('name', 'desc');
        }
        if (request()->has('oldest')) {
            $parts->orderBy('created_at');
        } else {
            $parts->orderBy('id');
        }

        return inertia()->render('Dashboard/parts/index', [
            'parts' => $parts->paginate(20),
        ]);
    }

    public function create()
    {
        return inertia()->render('Dashboard/parts/create', [
            'cars' => Car::all(),
            'categories' => Category::all(),
            'suppliers' => Supplier::all(),
            'part_types' => PartType::all(),
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

        $part = Part::create(Arr::except($data, ['cars','images']));

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
        return inertia()->render('Dashboard/parts/edit', [
            'part' => $part, 'cars' => Car::all(),
            'categories' => Category::all(), 'suppliers' => Supplier::all(),
            'part_types' => PartType::all(),
        ]);
    }

    public function update(StorePartRequest $request, Part $part)
    {
        $data = $request->validated();

        $part->update(Arr::except($data, ['cars','images']));
        
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
