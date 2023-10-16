<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Dashboard()
    {
        return view('Dashboard');
    }
    public function icon()
    {
        return view('icon');
    }
}
