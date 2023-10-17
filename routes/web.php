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
Route::get('/Absensi', [AbsensiController::class, 'index'])->name('Absensi');
Route::get('/Gaji', [GajiController::class, 'index'])->name('Gaji');
Route::get('/Jabatan', [JabatanController::class, 'index'])->name('Jabatan');
Route::get('/Table', [TableController::class, 'index'])->name('Table');
Route::get('/User', [UserController::class, 'index'])->name('User');

// Route::get('/login',[HomeController::class,'Login']);


Route::middleware([]);
Route::get('/',function(){
    return view('login');
});
Route::get('/sesi', [SessionController::class, 'index']);
Route::post('/sesi/login', [SessionController::class, 'Login']);
Route::get('/sesi/logout', [SessionController::class, 'logout']);
Route::get('/sesi/register', [SessionController::class, 'register']);
Route::post('/sesi/create', [SessionController::class, 'create']);

// Route::get('/Login', [AuthController::class, 'Login']);
// Route::get('/login', function () {
//     return view('auth.login');
// });
