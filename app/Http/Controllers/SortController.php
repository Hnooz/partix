<?php

namespace App\Http\Controllers;

class SortController extends Controller
{
    public function index()
    {
        if (request()->has('latest')) {
            $parts = Part::orderBy('id', 'desc')->get();
            
            return inertia()->render('Dashboard/parts/index', [
                'parts' => $parts,
            ]);
        } elseif (request()->has('a')) {
            $parts = Part::orderBy('name')->get();
            // dd($parts);
            return inertia()->render('Dashboard/parts/index', [
                'parts' => $parts,
            ]);
        } elseif (request()->has('z')) {
            $parts = Part::orderBy('name', 'desc')->get();

            return inertia()->render('Dashboard/parts/index', [
                'parts' => $parts,
            ]);
        } elseif (request()->has('oldest')) {
            $parts = Part::all();

            return inertia()->render('Dashboard/parts/index', [
                'parts' => $parts,
            ]);
        } else {
            $parts = Part::all();

            return inertia()->render('Dashboard/parts/index', [
                'parts' => $parts,
            ]);
        }
    }
}
