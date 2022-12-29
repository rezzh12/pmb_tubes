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

Route::get('admin/home',
    [App\Http\Controllers\AdminController::class, 'index'])->name('admin.pendaftar.jadwal.pembayaran.prodi')->middleware('is_admin');

Route::get('admin/tambah_pendaftar',
    [App\Http\Controllers\AdminController::class, 'view_input'])->name('admin.pendaftaran.jadwal.program_studi')->middleware('is_admin');
Route::get('admin/edit_pendaftar/{NISN}',
    [App\Http\Controllers\AdminController::class, 'view_edit'])->name('admin.pendaftaran.jadwal.program_studi')->middleware('is_admin');
Route::get('admin/pendaftar',
    [App\Http\Controllers\AdminController::class, 'view_pendaftar'])->name('admin.pendaftaran')->middleware('is_admin');
Route::get('admin/orangtua',
    [App\Http\Controllers\AdminController::class, 'view_orangtua'])->name('admin.pendaftaran')->middleware('is_admin');
Route::get('admin/sekolah',
    [App\Http\Controllers\AdminController::class, 'view_sekolah'])->name('admin.pendaftaran')->middleware('is_admin');
Route::get('admin/ajaxadmin/dataPendaftar/{NISN}', 
    [App\Http\Controllers\AdminController::class, 'getDatapendaftar']);
Route::post('admin/tambah_pendaftar', 
    [App\Http\Controllers\AdminController::class, 'submit_pendaftar'])->name('admin.pendaftaran.submit')->middleware('is_admin');
Route::post('admin/edit_pendaftar', 
    [App\Http\Controllers\AdminController::class, 'update_pendaftar'])->name('admin.pendaftaran.update')->middleware('is_admin');
Route::post('admin/pendaftar/delete/{NISN}', 
    [App\Http\Controllers\AdminController::class, 'delete_pendaftar'])->name('admin.jadwal.delete')->middleware('is_admin');
Route::get('admin/print_bukti/{NISN}', 
    [App\Http\Controllers\AdminController::class, 'print_bukti'])->name('admin.print.pendaftaran')->middleware('is_admin');
 Route::get('admin/pendaftar/export', [App\Http\Controllers\AdminController::class, 'export'])->name('admin.pendaftaran.export')->middleware('is_admin');


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

Route::get('admin/pengumuman',
    [App\Http\Controllers\AdminController::class, 'pengumuman'])->name('admin.pengumuman.program_studi')->middleware('is_admin');
Route::post('admin/pengumuman', 
    [App\Http\Controllers\AdminController::class, 'submit_pengumuman'])->name('admin.pengumuman.submit')->middleware('is_admin');
Route::patch('admin/pengumuman', 
    [App\Http\Controllers\AdminController::class, 'update_pengumuman'])->name('admin.pengumuman.update')->middleware('is_admin');
 Route::get('admin/ajaxadmin/dataPengumuman/{id}', 
    [App\Http\Controllers\AdminController::class, 'getDatapengumuman']);
Route::post('admin/pengumuman/delete/{id}', 
    [App\Http\Controllers\AdminController::class, 'delete_pengumuman'])->name('admin.pengumuman.delete')->middleware('is_admin');


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/daftar',
    [App\Http\Controllers\HomeController::class, 'view_input'])->name('admin.pendaftaran.jadwal.program_studi');
Route::post('/daftar', 
    [App\Http\Controllers\HomeController::class, 'submit_pendaftar'])->name('admin.pendaftaran.submit');

