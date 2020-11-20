<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PartsExport;


class ExportController extends Controller
{
    public function parts(){
        return Excel::download(new PartsExport, 'Parts.xlsx');

    }
}
