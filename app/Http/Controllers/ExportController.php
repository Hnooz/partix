<?php

namespace App\Http\Controllers;

use App\Exports\PartsExport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function parts()
    {
        return Excel::download(new PartsExport, 'Parts.xlsx');
    }

    public function users()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
