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
        $validator = Validator::make($request->all(),
        [
            'nama' => 'required',
            'id_pegawai' => 'required',
            'jabatan' => 'required',
            'gaji' => 'required',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan Anda
            'no_tlp' => 'required',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'id_pegawai.required' => 'ID pegawai tidak boleh kosong',
            'jabatan.required' => 'Jabatan tidak boleh kosong',
            'gaji.required' => 'Gaji tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'foto.required' => 'Foto tidak boleh kosong',
            'no_tlp.required' => 'No. Tlp tidak boleh kosong',
        ]);

        if ($validator)
        {
            return redirect('/Dashboard')->with('error', 'Data harus di isi sesuai');
        }

            $file = $request->file('foto');
            $fileName = Str::random(32)  . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/foto', $fileName);

            $pegawai = new Pegawai;
            $pegawai->nama = $request->nama;
            $pegawai->foto = $fileName;
            $pegawai->id_pegawai = $request->id_pegawai;
            $pegawai->jabatan = $request->jabatan;
            $pegawai->gaji = $request->gaji;
            $pegawai->alamat = $request->alamat;
            $pegawai->no_tlp = $request->no_tlp;
            $pegawai->save();
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
