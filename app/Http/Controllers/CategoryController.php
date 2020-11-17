<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        return inertia()->render('Dashboard/categories/index');
    }

    public function create()
    {
        return inertia()->render('Dashboard/categories/create');
    }

    public function store(Request $request)
    {

       $request->validate([
            'name'      =>  'required|max:255',
            'description'     =>  'required|max:255',
       ]);

       Category::create([
           'name' => $request->name,
           'description' => $request->description,

       ]);
            return redirect()->route('categories.index');
            
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

    public function destroy($id)
    {
        //
    }
}
