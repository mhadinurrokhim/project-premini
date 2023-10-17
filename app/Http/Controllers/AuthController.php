<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function Login()
    {
        return view('Login');
    }
    // public function showLoginForm()
    // {
    //     return view('auth.Login');
    // }

    // public function Login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    //         return redirect()->intended('/');
    //     }

    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ]);
    // }

    // public function showRegistrationForm()
    // {
    //     return view('auth.Register');
    // }

    // public function Register(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);

    //     $user = User::create($validatedData);

    //     Auth::login($user);

    //     return redirect()->route('home'); // Ganti dengan rute yang sesuai setelah pendaftaran berhasil.
    // }
}
