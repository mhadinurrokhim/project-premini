<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
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
        $jabatans = Jabatan::all();
        $dashboard = pegawai::with('jabatan')->get();
        $user = auth()->user();
        // dd(auth()->user());
        return view('User.Dashboard', compact('dashboard', 'user','jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dashboard = Jabatan::all();
        $dashboard = pegawai::with('jabatans','jabatan')->get();
        return view('User.Dashboard', compact('dashboard'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'nama' => 'required',
            'foto' => 'required',
            'id_pegawai' => 'required|unique:pegawais,id_pegawai',
            'id_jabatan' => 'required',
            'gaji' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required|numeric|gt:0',
        ], [
            'nama.required' => 'nama tidak boleh kosong!',
            'foto.required' => 'foto tidak boleh kosong!',
            'id_pegawai.required' => 'id pegawai tidak boleh kosong!',
            'id_pegawai.unique' => 'id pegawai harus unik!',
            'id_jabatan.required' => 'jabatan tidak boleh kosong!',
            'gaji.required' => 'gaji tidak boleh kosong!',
            'alamat.required' => 'alamat tidak boleh kosong!',
            'no_tlp.required' => 'no tlp tidak boleh kosong!',
            'no_tlp.numeric' => 'no tlp harus berupa angka!',
            'no_tlp.gt' => 'no tlp tidak valid !',
        ]);

            $file = $request->file('foto');
            $fileName = Str::random(32)  . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/foto', $fileName);

            Pegawai::create([
                'nama' => $request->nama,
                'foto' => $fileName,
                'id_pegawai' => $request->id_pegawai,
                'id_jabatan' => $request->id_jabatan,
                'gaji' => $request->gaji,
                'alamat' => $request->alamat,
                'no_tlp' => $request->no_tlp
            ]);
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
