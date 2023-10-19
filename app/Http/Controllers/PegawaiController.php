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
        return view('User.Dashboard',compact('dashboard'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('User.Dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'nama'=>'required',
            'id_pegawai'=>'required',
            'jabatan'=>'required',
            'gaji'=>'required',
            'alamat'=>'required',
            'no_tlp'=>'required'
        ],[
            'nama.required'=>'nama tidak boleh kosong',
            'id_pegawai.required'=>'id pegawai tidak boleh kosong',
            'jabatan.required'=> 'jabatan tidak boleh kosong',
            'gaji.required'=> 'gaji tidak boleh kosong',
            'alamat.required'=> 'alamat tidak boleh kosong',
            'no_tlp.required'=> 'no tlp tidak boleh kosong'
        ]);

        $pegawai = new Pegawai;
        $pegawai->nama = $request->nama;
        $pegawai->foto = $request->foto;
        $pegawai->id_pegawai=$request->id_pegawai;
        $pegawai->jabatan=$request->jabatan;
        $pegawai->gaji=$request->gaji;
        $pegawai->alamat=$request->alamat;
        $pegawai->no_tlp=$request->no_tlp;
        $pegawai->save();

        // dd($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        return view('Dashboard', compact('dashboard'));
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
        $validatedData = $request->validated();
        $pegawai->update($validatedData);

        return redirect()->route('Dashboard')->with('success', 'Pegawai update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($pegawai)
    {
        $pegawai = Pegawai::find($pegawai);
        $pegawai->delete();

        return redirect()->route('Dashboard')->with('success', 'Pegawai deleted successfully');
    }
}
