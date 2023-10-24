<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class KonfirmasiController extends Controller
{
    public function index()
    {
        return view('Admin.Konfirmasi');
    }
}
