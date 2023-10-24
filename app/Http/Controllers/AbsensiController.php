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


    
    public function create()
    {
        return view('User.Absensi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAbsensiRequest $request)
    {

        $this->validate($request,[
            'pegawai_id'=>'required',
            'tanggal'=>'required',
            'keterangan'=>'required'
        ],[
            'pegawai_id.required'=>'pegawai_id tidak boleh kosong',
            'tanggal.required'=>'id tanggal tidak boleh kosong',
            'keterangan.required'=> 'keterngan tidak boleh kosong'
        ]);

        $absensi = new Absensi;
        $absensi->pegawai_id = $request->pegawai_id;
        $absensi->tanggal=$request->tanggal;
        $absensi->keterangan=$request->keterangan;
        $absensi->save();

        return redirect()->back();
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
        $validatedData = $request->validated();
        $absensi->update($validatedData);

        return redirect()->route('data')->with('success', 'Absensi update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        $absensi = Absensi::find($absensi);
        $absensi->delete();

        return redirect()->route('data')->with('success', 'Pegawai deleted successfully');
    }
}
