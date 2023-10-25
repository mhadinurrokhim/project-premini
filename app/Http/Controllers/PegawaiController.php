<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dashboard = pegawai::all();
        // dd(auth()->user());
        return view('User.Dashboard', compact('dashboard'));
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
        Validator::make($request->all(),
        [
            'id_pegawai'=>'required',
            'tanggal'=>'required',
            'keterangan'=>'required'
        ],[
            'id_pegawai.required'=>'pegawai id tidak boleh kosong',
            'tanggal.required'=>'tanggal tidak boleh kosong',
            'keterangan.required'=> 'keterngan tidak boleh kosong'
        ]);

        try {
            $file = $request->file('foto');
            $fileName = Str::random(32)  . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/foto', $fileName);

            Pegawai::create([
                'nama' => $request->nama,
                'foto' => $fileName,
                'id_pegawai' => $request->id_pegawai,
                'jabatan' => $request->jabatan,
                'gaji' => $request->gaji,
                'alamat' => $request->alamat,
                'no_tlp' => $request->no_tlp
            ]);
        } catch (\Throwable $th) {
            return redirect('/Dashboard')->with('error', 'Data harus di isi sesuai');
        }
        return redirect('/Dashboard')->with('success', 'Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        return view('User.Dashboard', compact('dashboard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        return view('Dashboard', compact('dashboard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::find($id);

        // Mengambil foto yang sudah ada sebelumnya
        $existingFoto = $pegawai->foto;

        $pegawai->update([
            'nama' => $request->input('nama'),
            'id_pegawai' => $request->input('id_pegawai'),
            'jabatan' => $request->input('jabatan'),
            'gaji' => $request->input('gaji'),
            'alamat' => $request->input('alamat'),
            'no_tlp' => $request->input('no_tlp'),
        ]);

        // Periksa apakah ada file gambar baru yang diunggah
        if ($request->hasFile('foto')) {
            // Validasi dan simpan foto yang baru diunggah
            $this->validate($request, [
                'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan Anda
            ]);

            $file = $request->file('foto');
            $fileName = Str::random(32)  . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/foto'), $fileName);

            // Update atribut foto hanya jika ada file gambar yang diunggah
            $pegawai->update(['foto' => $fileName]);

            // Hapus foto yang lama jika sudah ada
            if ($existingFoto) {
                Storage::delete('foto/' . $existingFoto);
            }
        }

        return redirect()->route('Dashboard')->with('success', 'Pegawai berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($pegawai)
    {
        $pegawai = Pegawai::find($pegawai);

        if ($pegawai) {
            // Hapus foto dari direktori penyimpanan
            if ($pegawai->foto && $pegawai->foto !== 'default.jpg') {
                Storage::delete('public/foto/' . $pegawai->foto);
            }

            // Hapus rekaman dari database
            $pegawai->delete();

            return redirect()->route('Dashboard')->with('success', 'Pegawai deleted successfully');
        }

        return redirect()->route('Dashboard')->with('error', 'Pegawai not found');
    }
}
