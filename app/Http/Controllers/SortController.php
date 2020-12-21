<?php

namespace App\Http\Controllers;

class SortController extends Controller
{
    public function sortByNameDesc()
    {
        $parts = Part::larest()->get();

        return inertia()->render('Dashboard/parts/index', [
            'parts' => $parts,
        ]);
    }
}
