<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home',
    [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home')->middleware('is_admin');

Route::get('admin/pendaftaran',
    [App\Http\Controllers\AdminController::class, 'pendaftaran'])->name('admin.pendaftaran.program_studi.jadwal')->middleware('is_admin');
Route::get('admin/pendaftaran/tambah_pendaftar',
    [App\Http\Controllers\AdminController::class, 'view_input'])->name('admin.pendaftaran')->middleware('is_admin');
Route::post('admin/pendaftaran', 
    [App\Http\Controllers\AdminController::class, 'submit_pendaftar'])->name('admin.pendaftaran.submit')->middleware('is_admin');

Route::get('admin/jadwal',
    [App\Http\Controllers\AdminController::class, 'jadwal'])->name('admin.jadwal')->middleware('is_admin');
Route::post('admin/jadwal', 
    [App\Http\Controllers\AdminController::class, 'submit_jadwal'])->name('admin.jadwal.submit')->middleware('is_admin');
Route::patch('admin/jadwal', 
    [App\Http\Controllers\AdminController::class, 'update_jadwal'])->name('admin.jadwal.update')->middleware('is_admin');
 Route::get('admin/ajaxadmin/dataJadwal/{id}', 
    [App\Http\Controllers\AdminController::class, 'getDatajadwal']);
Route::post('admin/jadwal/delete/{id}', 
    [App\Http\Controllers\AdminController::class, 'delete_jadwal'])->name('admin.jadwal.delete')->middleware('is_admin');


Route::get('admin/pembayaran',
    [App\Http\Controllers\AdminController::class, 'pembayaran'])->name('admin.pembayaran')->middleware('is_admin');
    Route::post('admin/pembayaran', 
    [App\Http\Controllers\AdminController::class, 'submit_pembayaran'])->name('admin.pembayaran.submit')->middleware('is_admin');
Route::patch('admin/pembayaran', 
    [App\Http\Controllers\AdminController::class, 'update_pembayaran'])->name('admin.pembayaran.update')->middleware('is_admin');
 Route::get('admin/ajaxadmin/dataPembayaran/{id}', 
    [App\Http\Controllers\AdminController::class, 'getDatapembayaran']);
Route::post('admin/pembayaran/delete/{id}', 
    [App\Http\Controllers\AdminController::class, 'delete_pembayaran'])->name('admin.pembayaran.delete')->middleware('is_admin');

 Route::get('admin/prodi',
    [App\Http\Controllers\AdminController::class, 'prodi'])->name('admin.prodi')->middleware('is_admin');
 Route::post('admin/prodi', 
    [App\Http\Controllers\AdminController::class, 'submit_prodi'])->name('admin.prodi.submit')->middleware('is_admin');
Route::patch('admin/prodi', 
    [App\Http\Controllers\AdminController::class, 'update_prodi'])->name('admin.prodi.update')->middleware('is_admin');
 Route::get('admin/ajaxadmin/dataProdi/{id}', 
    [App\Http\Controllers\AdminController::class, 'getDataprodi']);
Route::post('admin/prodi/delete/{id}', 
    [App\Http\Controllers\AdminController::class, 'delete_prodi'])->name('admin.prodi.delete')->middleware('is_admin');