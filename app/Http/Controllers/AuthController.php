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
        ]);
        if (User::where('email', $request->email)->exists()) {
            return redirect('/register')->with('error', 'Alamat email sudah terdaftar. Gunakan alamat email lain.');
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
        return redirect('/register')->with('success', 'cek gmail untuk verifikasi email');
    }

    public function proseslogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $customMessages = [
            'email.required' => 'The email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'password.required' => 'The password is required.',
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
                return redirect('/AdminDashboard')->with('success', 'Berhasil login');
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
