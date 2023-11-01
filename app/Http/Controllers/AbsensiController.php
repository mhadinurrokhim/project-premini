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
        $pegawai = Pegawai::all();
        $absensi = Absensi::with('pegawai')->get();
        $user = auth()->user();
        return view('User.Absensi', compact('absensi', 'user', 'pegawai'));
    }

    public function Absen()
    {
        return view('User.Absensi');
    }

    public function create()
    {
        $dashboard = Pegawai::all();
        $absensi = Absensi::with('Pegawai','nip')->get();
        return view('User.Absensi', compact('absensi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAbsensiRequest $request)
    {
        $this->validate($request, [
            'id_nip' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required'
        ], [
            'id_nip.required' => 'NIP tidak boleh kosong!',
            'tanggal.required' => 'tanggal tidak boleh kosong!',
            'keterangan.required' => 'keterangan tidak boleh kosong!'
        ]);


        $absensi = new Absensi;
        $absensi->id_nip = $request->id_nip;
        $absensi->tanggal=$request->tanggal;
        $absensi->keterangan=$request->keterangan;
        $absensi->save();

        return redirect()->back()->with('success' , 'Data berhasil di tambahkan');
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
            'nip' => $request->input('id_nip'),
            'tanggal' => $request -> input('tanggal'),
            'keterangan' => $request->input('keterangan')
        ]);

        return redirect()->route('Absensi')->with('success', 'Data berhasil di perbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $absensi = Absensi::find($id);
        $absensi->delete();
        return back()->with('success', 'Data berhasil di hapus');
    }

}
