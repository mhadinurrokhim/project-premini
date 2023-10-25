<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;
use App\Models\Pegawai;

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
        $validator = Absensi::make($request->all(),
        [
            'id_pegawai'=>'required',
            'tanggal'=>'required',
            'keterangan'=>'required'
        ],[
            'id_pegawai.required'=>'pegawai id tidak boleh kosong',
            'tanggal.required'=>'tanggal tidak boleh kosong',
            'keterangan.required'=> 'keterngan tidak boleh kosong'
        ]);

        if ($validator)
        {
            return redirect('/Absensi')->with('error', 'Data harus di isi sesuai');
        }

        $absensi = new Absensi;
        $absensi->id_pegawai = $request->id_pegawai;
        $absensi->tanggal=$request->tanggal;
        $absensi->keterangan=$request->keterangan;
        $absensi->save();

        return redirect('/Absensi')->back('success', 'Data berhasil di tambahkan');
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
    public function update(UpdateAbsensiRequest $request, $id)
    {
        $absensi = Absensi::find($id);
        $absensi->update([
            'id_pegawai' => $request->input('id_pegawai'),
            'tanggal' => $request -> input('tanggal'),
            'keterangan' => $request->input('keterangan')
        ]);

        return redirect()->route('Absensi')->with('success', 'Absensi update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $absensi = Absensi::find($id);
        $absensi->delete();
        return redirect()->route('Absensi')->with('Auccess', 'Absensi deleted successfully');
    }
}
