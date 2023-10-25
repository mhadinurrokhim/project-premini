<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class KonfirmasiController extends Controller
{
    public function index()
    {
        $dashboard = pegawai::all();
        return view('Admin.Konfirmasi',compact('dashboard'));
    }
}
