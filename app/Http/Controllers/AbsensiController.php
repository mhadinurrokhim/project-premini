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
        $absensi = Absensi::all();
        return view('User.Absensi', compact('absensi'));
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
            'id_pegawai'=>'required',
            'tanggal'=>'required',
            'keterangan'=>'required'
        ],[
            'id_pegawai.required'=>'pegawai id tidak boleh kosong',
            'tanggal.required'=>'tanggal tidak boleh kosong',
            'keterangan.required'=> 'keterngan tidak boleh kosong'
        ]);


        $absensi = new Absensi;
        $absensi->id_pegawai = $request->id_pegawai;
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
        return view('User.Absensi', compact('absensi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        return view('Absensi', compact('absensi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsensiRequest $request, Absensi $absensi)
    {
        $validatedData = $request->validated();
        $absensi->update($validatedData)([
            'id_pegawai' => $request->input('id_pegawai'),
            'tanggal' => $request -> input('tanggal'),
            'keterangan' => $request->input('keterangan')
        ]);

        return redirect()->route('absensi')->with('success', 'Absensi update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        $absensi = Absensi::find($absensi);
        $absensi->delete();

        return redirect()->route('Absensi')->with('success', 'Absensi deleted successfully');
    }
}
