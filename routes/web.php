<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TypograhpyController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/Dashboard',[HomeController::class, 'Dashboard']);
// Route::get('/icon', [HomeController::class, 'icon']);

Route::get('/Dashboard', [PegawaiController::class, 'index'])->name('Dashboard');
Route::post('/create', [PegawaiController::class, 'store'])->name('SimpanPegawai');
Route::put('/update', [PegawaiController::class, 'update'])->name('update');


Route::get('/Absensi', [AbsensiController::class, 'index'])->name('Absensi');
Route::get('/Gaji', [GajiController::class, 'index'])->name('Gaji');
Route::get('/Jabatan', [JabatanController::class, 'index'])->name('Jabatan');
Route::get('/Table', [TableController::class, 'index'])->name('Table');
Route::get('/User', [UserController::class, 'index'])->name('User');
Route::get('/Typography',[TypograhpyController::class, 'index'])->name('Typography');


// Route::get('/login',[HomeController::class,'Login']);


// Route::middleware([]);
// Route::get('/',function(){
//     return view('login');
// });
// Route::get('/sesi', [SessionController::class, 'index']);
// Route::post('/sesi/login', [SessionController::class, 'Login']);
// Route::get('/sesi/logout', [SessionController::class, 'logout']);
// Route::get('/sesi/register', [SessionController::class, 'register'])->name('register');
// Route::post('/sesi/create', [SessionController::class, 'create']);


Route::get('/', [AuthController::class, 'index']);
Route::get('/login',[AuthController::class, 'index'])->name('login');
Route::post('/proseslogin',[AuthController::class, 'proseslogin'])->name('proseslogin');
Route::get('/register',[AuthController::class, 'register'])->name('register');
Route::post('/Createregister',[AuthController::class, 'Createregister'])->name('Createregister');
Route::get('Forget',[AuthController::class, 'Forget']);
Route::get('change',[AuthController::class, 'change']);
Route::get('logout',[AuthController::class, 'logout']);
Route::get('/email/verify', function () {
    return view('Auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');



// Route::get('/Login', [AuthController::class, 'Login']);
// Route::get('/login', function () {
//     return view('auth.login');
// });

//delete
Route::delete('/dashboard/{id}', [PegawaiController::class, 'destroy']);

// Route::put('/dashboard/{id}', [PegawaiController::class, 'edit'])->name('edit');
