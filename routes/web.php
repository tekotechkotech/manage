<?php

use App\Http\Controllers\CabangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    // return redirect()->route('dashboard');
    // return view('welcome');

    // dd('sini');
})->middleware('auth');

Route::get('/', function () {
    $instansi = app('instansi');
    // dd($instansi);
    return redirect()->to('https://login.' . $instansi->web);
    // return view('welcome');
})->middleware('guest');


// Route::get('login',function() {
    
// })


Route::get('/home', function () {
    return redirect()->route('pengurus');
    // return view('welcome');

    // dd('sini');
})->name('home')->middleware('auth');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::get('/instansi',[InstansiController::class,'index'])->name('instansi');
Route::get('/cabang',[CabangController::class,'index'])->name('cabang');
Route::get('/kelas',[KelasController::class,'index'])->name('kelas');


Route::get('/pengurus', [UserController::class, 'pengurus'])->name('pengurus');
Route::get('pengurus/getPengurus', [UserController::class, 'getPengurus'])->name('pengurus.getPengurus');

Route::get('/pengurus/tambah', [UserController::class, 'pengurus_tambah'])->name('pengurus.create');


Route::get('/pesertadidik', [UserController::class, 'pesertadidik'])->name('pesertadidik');

Route::post('/pesertadidik', [UserController::class, 'pesertadidik'])->name('logout');