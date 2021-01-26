<?php

namespace App\Http\Controllers;

class ErrorAndMessageController extends Controller
{
    public function message()
    {
        return inertia()->render('Store/message');
    }
}
