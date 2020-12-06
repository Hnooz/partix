<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return inertia()->render('Dashboard/Index');
    }

    public function ui()
    {
        return inertia()->render('Dashboard/UI');
    }
}
