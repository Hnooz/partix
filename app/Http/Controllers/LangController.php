<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function lang($language)
    {
        Session()->put('locale', $language);
 
        return redirect()->back();
    }
}
