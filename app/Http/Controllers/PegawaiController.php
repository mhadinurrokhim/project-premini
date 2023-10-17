<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'=>'required',
            'foto'=>'required',
            'id_pegawai'=>'required',
            'jabatan'=>'required',
            'gaji'=>'required',
            'alamat'=>'required',
            'no_tlp'=>'required'
        ]);
        Pegawai::create([
            'nama'=>$request->nama,
            'foto'=>$request->foto,
            'id_pegawai'=>$request->id_pegawai,
            'jabatan'=>$request->jabatan,
            'gaji'=>$request->gaji,
            'alamat'=>$request->alamat,
            'no_tlp'=>$request->no_tlp
        ]);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        //
    }
}
