<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }
    function register()
    {
        return view('Auth.register');
    }
    function Forget()
    {
        return view('Auth.Forget');
    }

    function change()
    {
        return view('Auth.change');
    }

    public function Createregister(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ], [
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Alamat email harus diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'email.unique' => 'Alamat email sudah terdaftar. Gunakan alamat email lain.',
            'password.required' => 'Kata sandi harus diisi.',
            'password.min' => 'Kata sandi minimal harus terdiri dari 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'password_confirmation.required' => 'Konfirmasi kata sandi harus diisi.',
        ]);
        if (User::where('email', $request->email)->exists()) {
            return redirect('/login')->with('error', 'Alamat email sudah terdaftar. Gunakan alamat email lain.');
        }
        $data = [
            'name' => $request->name,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
            'changepassword' => $request->password,
            'role' => 'user',

        ];
        $user = User::create($data); // Membuat pengguna baru dan menyimpannya

        event(new Registered($user));
        Auth::login($user);
        return redirect('/login')->with('success', 'cek gmail untuk verifikasi email');
    }

    public function proseslogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $customMessages = [
            'email.required' => 'email harus diisi.',
            'email.email' => 'email sudah ada.',
            'password.required' => 'passowrd harus diisi.',
        ];


        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            if (auth()->user()->role == 'user'){
                return redirect('/Dashboard')->with('success', 'Berhasil login');
                return redirect('/login')->with('error', 'Email atau password salah');

            }else if(auth()->user()->role == 'admin'){
                return redirect('/Konfirmasi')->with('success', 'Berhasil login');
                return redirect('/Konfirmasi')->with('error', 'Email atau password salah');
            }
        }


        return redirect()->back()->withInput($request->except('password'))->withErrors(['password' => 'Invalid credentials']);

    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with('success', 'Berhasil logout');
    }
}
