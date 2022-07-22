<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PembelianController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('test', function () {
    return view('layouts.admin');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function(){
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/', function(){
        return view('admin.index');
    });
// route siswa
Route::resource('siswa', SiswaController::class);
// route siswa
Route::resource('Pembelian', PembelianController::class);
});