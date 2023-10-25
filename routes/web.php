<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\TableController;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TypograhpyController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::middleware([AdminMiddleware::class])->group(function(){
    Route::get('/AdminDashboard', [AdminController::class,'index'])->name('AdminDashboard');
    Route::get('/Konfirmasi', [KonfirmasiController::class,'index'])->name('Konfirmasi');

});


Route::middleware([UserMiddleware::class])->group(function(){

    Route::get('/Dashboard', [PegawaiController::class, 'index'])->name('Dashboard');
    Route::post('/SimpanPegawai', [PegawaiController::class, 'store'])->name('SimpanPegawai');
    Route::delete('/dashboard/{id}', [PegawaiController::class, 'destroy']);
    Route::put('/updatePegawai/{id}', [PegawaiController::class, 'update'])->name('updatePegawai');


    Route::get('/Absensi', [AbsensiController::class, 'index'])->name('Absensi');
    Route::post('/storeAbsensi', [AbsensiController::class, 'store'])->name('storeAbsensi');
    Route::put('/updateAbsensi/{id}', [AbsensiController::class, 'update'])->name('updateAbsensi');
    Route::delete('/absensi/{id}', [AbsensiController::class, 'destroy']);


    Route::get('/Gaji', [GajiController::class, 'index'])->name('Gaji');
    Route::post('/create', [GajiController::class, 'store'])->name('SimpanGaji');
    Route::put('/updateGaji/{id}', [GajiController::class, 'update'])->name('updateGaji');
    Route::delete('/deletegaji/{id}', [GajiController::class, 'destroy']);


    Route::get('/Jabatan', [JabatanController::class, 'index'])->name('Jabatan');
    Route::get('/Table', [TableController::class, 'index'])->name('Table');
    Route::get('/User', [UserController::class, 'index'])->name('User');
    Route::get('/Typography',[TypograhpyController::class, 'index'])->name('Typography');


});


    Route::get('/', [AuthController::class, 'index']);
    Route::get('/login',[AuthController::class, 'index'])->name('login');
    Route::post('/proseslogin',[AuthController::class, 'proseslogin'])->name('proseslogin');
    Route::get('/register',[AuthController::class, 'register'])->name('register');
    Route::post('/Createregister',[AuthController::class, 'Createregister'])->name('Createregister');
    Route::get('Forget',[AuthController::class, 'Forget']);
    Route::get('change',[AuthController::class, 'change']);
    Route::get('logout',[AuthController::class, 'logout']);


// verifikasi saat register
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/verify-email', function(){
    return 'ini halaman profile. penanda bahwa user sudah login dan terverifikasi';
})->middleware(['auth', 'verified']);



// resetpassword
// Route::get('/forgot-password', function () {
//     return view('auth.Forget');
// })->middleware('guest')->name('password.request');

// Route::post('/forgot-password', function (Request $request) {

// })->middleware('guest')->name('password.email');
