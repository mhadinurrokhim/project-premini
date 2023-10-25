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
        return view('User.Jabatan',compact('jabatan'));
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
        $validator = Jabatan::make($request->all(),
        [
            'jabatan'=>'required',
            'deskripsi'=>'required',
            'gaji'=>'required'
        ],[
            'jabatan.required'=>'jabatan tidak boleh kosong',
            'deskripsi.required'=>'deskripsi tidak boleh kosong',
            'gaji.required'=> 'gaji pembayaran tidak boleh kosong'
        ]);

        if ($validator)
        {
            return redirect('/Jabatan')->with('error', 'Data harus di isi sesuai');
        }

        $jabatan = new Jabatan;
        $jabatan->jabatan = $request->jabatan;
        $jabatan->deskripsi=$request->deskripsi;
        $jabatan->gaji=$request->gaji;
        $jabatan->save();

        return redirect('/jabatan')->back('error', 'Data harus di isi sesuai');
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
            'deskripsi' => $request -> input('deskripsi'),
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
        return back()->with('Success', 'Jabatan deleted successfully');
    }
}
