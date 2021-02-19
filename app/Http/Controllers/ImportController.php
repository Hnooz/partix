<?php

namespace App\Http\Controllers;

use App\Imports\CarsImport;
use App\Imports\PartImport;
use App\Imports\TagsImport;
use Illuminate\Http\Request;
use App\Imports\BrandsImport;
use App\Imports\SuppliersImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function parts()
    {
        $parts = Excel::import(new PartImport, request()->file('files'));

        return response()->json(['data' => $parts, 'redirect' => 'dashboard/parts']);
    }

    public function suppliers()
    {
        $suppliers = Excel::import(new SuppliersImport, request()->file('files'));

        return response()->json(['data' => $suppliers, 'redirect' => 'dashboard/suppliers']);
    }

    public function brands()
    {
        $brands = Excel::import(new BrandsImport, request()->file('files'));

        return response()->json(['data' => $brands, 'redirect' => 'dashboard/brands']);
    }
    public function cars()
    {
        $cars = Excel::import(new CarsImport, request()->file('files'));

        return response()->json(['data' => $cars, 'redirect' => 'dashboard/cars']);
    }
    public function tags()
    {
        $tags = Excel::import(new TagsImport, request()->file('files'));

        return response()->json(['data' => $tags, 'redirect' => 'dashboard/tags']);
    }
}
