<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatan = Jabatan::all();
        $user = auth()->user();
        return view('User.Jabatan',compact('jabatan', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('User.Jabatan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'jabatan'=>'required',
            'gaji'=>'required|gte:0'
        ],[
            'jabatan.required'=>'jabatan tidak boleh kosong!',
            'gaji.required'=> 'gaji tidak boleh kosong!',
            'gaji.gte' => 'gaji tidak valid!',
        ]);

        $jabatan = new Jabatan;
        $jabatan->jabatan = $request->jabatan;
        $jabatan->gaji=$request->gaji;
        $jabatan->save();

        return redirect('/Jabatan')->with('success', 'Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        return view('User.Jabatan', compact('jabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        return view('Jabatan', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatan, $id)
    {
        $jabatan = Jabatan::find($id);
        $jabatan->update([
            'jabatan' => $request->input('jabatan'),
            'gaji' => $request->input('gaji')
        ]);

        return back()->with('success', 'Jabatan update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan, $id)
    {
        $jabatan = Jabatan::find($id);
        $jabatan->delete();

        return redirect()->route('Jabatan')->with('success', 'Pegawai deleted successfully');
    }
}
