<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index(){
        return view("Login");
    }

    function login(Request $request){
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'email wajib diisi',
            'password.required' => 'password wajib diisi',
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if (Auth::attempt($infologin)) {
            // kalau otentifikasi sukses
            // return 'sukses';
            return redirect('Siswa')->with('success','Berhasil login');
        }else {
            // kalau otentifikasi gagal
            // return 'gagal';
            return redirect('sesi')->with('error','username dan password tidak valid');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('sesi')->with('success','berhasil logout');
    }

    function register(){
        return view('login');
    }

    function create(Request $request){
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:7'
        ], [
            'name.required' => 'nama wajib diisi',
            'email.required' => 'email wajib diisi',
            'email.email' => 'masukan email yang valid',
            'email.unique' => 'email sudah ada didatabase',
            'password.required' => 'password wajib diisi',
            'password.min' => 'minimum password 7 karakter'
        ]);

        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ];

        User::create($data);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if (Auth::attempt($infologin)) {

            // kalau otentifikasi sukses
            // return 'sukses';
            return redirect('Siswa')->with('
            success', Auth::user()->name . 'Berhasil login');
        }else {
            // kalau otentifikasi gagal
            // return 'gagal';
            return redirect('sesi')->with('error','username dan password tidak valid');
        }
    }
}
