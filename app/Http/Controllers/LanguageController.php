<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function show($language)
    {
        Session()->put('locale', $language);
 
        return redirect()->back();
    }
}
