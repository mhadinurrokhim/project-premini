<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Absensi::all();
        return view('User.Absensi', compact('data'));
    }

    public function Absen()
    {
        return view('User.Absensi');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('User.Absensi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAbsensiRequest $request)
    {
        $validator =validator($request->all(),[
            'pegawai_id',
            'tanggal',
            'keterangan'
        ],[
            'pegawai_id.required'=>'id pegawai tidak boleh kosong',
            'tanggal.required'=>'tanggal tidak boleh kosong',
            'keterangan.required'=> 'keterangan tidak boleh kosong'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsensiRequest $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        //
    }
}
