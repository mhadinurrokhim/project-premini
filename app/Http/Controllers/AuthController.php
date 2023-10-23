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

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'email' =>$request->email,
            'password' => Hash::make($request->password),

        ];
        // event(new Registered($user));
        // Auth::login($user);

        User::create($data);
        return redirect('/login')->with('success', 'Berhasil register');
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
            return redirect('/Dashboard')->with('success', 'Berhasil login');
            return redirect('/login')->with('error', 'Email atau password salah');
        }


        return redirect()->back()->withInput($request->except('password'))->withErrors(['password' => 'Invalid credentials']);

    }
    // public function proseslogin(Request $request){
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required'
    //     ], [
    //         'email.required' => 'Email wajib diisi',
    //         'password.required' => 'Password wajib diisi',
    //     ]);

    //     $infologin = [
    //         'email' => $request->email,
    //         'password' => $request->password
    //     ];

    //     if (Auth::attempt($infologin)) {
    //         return redirect()->route('login')->withErrors('Username dan password yang dimasukkan tidak valid');
    //     } else {
    //         return redirect()->route('Dashboard')->with('success', 'Berhasil login');
    //     }
    // }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with('success', 'Berhasil logout');
    }
}
