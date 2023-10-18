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
        $dashboard=pegawai::all();
        return view('Dashboard',compact('dashboard'));
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
        // $this->validate($request,[
        //     'nama'=>'required',
        //     'foto'=>'required',
        //     'id_pegawai'=>'required',
        //     'jabatan'=>'required',
        //     'gaji'=>'required',
        //     'alamat'=>'required',
        //     'no_tlp'=>'required'
        // ]);

        // Pegawai::create([
        //     'nama'=>$request->nama,
        //     'foto'=>$request->foto,
        //     'id_pegawai'=>$request->id_pegawai,
        //     'jabatan'=>$request->jabatan,
        //     'gaji'=>$request->gaji,
        //     'alamat'=>$request->alamat,
        //     'no_tlp'=>$request->no_tlp
        // ]);

        $pegawai = new Pegawai;
        $pegawai->nama = $request->nama;
        // $pegawai->foto = $request->foto;
        $pegawai->id_pegawai=$request->id_pegawai;
        $pegawai->jabatan=$request->jabatan;
        $pegawai->gaji=$request->gaji;
        $pegawai->alamat=$request->alamat;
        $pegawai->no_tlp=$request->no_tlp;
        $pegawai->save();

        // dd($request);
        return redirect()->route('Dashboard');
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
