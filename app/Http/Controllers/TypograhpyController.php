<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypograhpyController extends Controller
{
    public function index()
    {
        return view('User.Typography');
    }
}
