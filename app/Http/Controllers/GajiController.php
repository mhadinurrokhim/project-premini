<?php

namespace App\Http\Controllers;

use App\Models\gaji;
use App\Http\Requests\StoregajiRequest;
use App\Http\Requests\UpdategajiRequest;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gaji= Gaji::all();
        $user = auth()->user();
        return view('User.Gaji', compact('gaji', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('User.Gaji');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoregajiRequest $request)
    {
        $this->validate($request,
        [
            'id_pegawai'=>'required|gt:0|unique:gajis,id_pegawai',
            'jumlah'=>'required',
            'tanggal_pembayaran'=>'required'
        ],[
            'id_pegawai.required'=>'NIP tidak boleh kosong!',
            'id_pegawai.gt'=>'NIP tidak valid!',
            'id_pegawai.unique' => 'NIP sudah digunakan!',
            'jumlah.required'=>'jumlah tidak boleh kosong!',
            'tanggal_pembayaran.required'=> 'tanggal tidak boleh kosong!'
        ]);


        $gaji = new gaji;
        $gaji->id_pegawai = $request->id_pegawai;
        $gaji->jumlah=$request->jumlah;
        $gaji->tanggal_pembayaran=$request->tanggal_pembayaran;
        $gaji->save();

        return redirect('/Gaji')->with('success', 'Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(gaji $gaji)
    {
        return view('User.Gaji', compact('gaji'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(gaji $gaji)
    {
        return view('User.Gaji', compact('gaji'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdategajiRequest $request, gaji $gaji, $id )
    {
        $gaji = gaji::find($id);
        $gaji->update([
            'id_pegawai' => $request->input('id_pegawai'),
            'jumlah' => $request -> input('jumlah'),
            'tanggal_pembayaran' => $request->input('tanggal_pembayaran')
        ]);

        return back()->with('success', 'Gaji update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(gaji $gaji ,$id)
    {
        $gaji = gaji::find($id);
        $gaji->delete();

        return redirect()->route('Gaji')->with('success', 'Pegawai deleted successfully');
    }
}
