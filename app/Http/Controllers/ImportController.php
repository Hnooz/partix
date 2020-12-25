<?php

namespace App\Http\Controllers;

use App\Imports\PartImport;
use Illuminate\Http\Request;
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
}
