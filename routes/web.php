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

Route::get('/', [App\Http\Controllers\PublicController::class, 'index']);
Route::get('/rekomendasi', [App\Http\Controllers\PublicController::class, 'rekomendasi'])->name('rekomendasi');
Route::post('/filter-rekomendasi', [App\Http\Controllers\PublicController::class, 'FilterRekomendasi'])->name('FilterRekomendasi');
Route::get('/detail/{id}', [App\Http\Controllers\PublicController::class, 'detail'])->name('detail');
Route::get('/reload-captcha', [App\Http\Controllers\PublicController::class, 'reloadCaptcha'])->name('reloadCaptcha');
Route::post('/post-ulasan', [App\Http\Controllers\PublicController::class, 'postUlasan'])->name('postUlasan');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/master-tempat', [App\Http\Controllers\TempatController::class, 'masterTempat'])->name('masterTempat');
Route::get('/master-ulasan', [App\Http\Controllers\TempatController::class, 'masterUlasan'])->name('masterUlasan');
Route::get('/master-ulasan/disetujui', [App\Http\Controllers\TempatController::class, 'masterUlasanDisetujui'])->name('masterUlasanDisetujui');
Route::get('/master-ulasan/ditolak', [App\Http\Controllers\TempatController::class, 'masterUlasanDitolak'])->name('masterUlasanDitolak');
Route::get('/master-ulasan/pending', [App\Http\Controllers\TempatController::class, 'masterUlasanDipending'])->name('masterUlasanDipending');
Route::get('/approve_ulasan/{id}', [App\Http\Controllers\TempatController::class, 'ApproveUlasan'])->name('ApproveUlasan');
Route::get('/tolak-ulasan/{id}', [App\Http\Controllers\TempatController::class, 'TolakUlasan'])->name('TolakUlasan');
Route::get('/delete-ulasan/{id}', [App\Http\Controllers\TempatController::class, 'DeleteUlasan'])->name('DeleteUlasan');

Route::post('/post-fasilitas', [App\Http\Controllers\TempatController::class, 'postFasilitas'])->name('postFasilitas');
Route::patch('/update-fasilitas', [App\Http\Controllers\TempatController::class, 'editFasilitas'])->name('editFasilitas');
Route::get('/delete-fasilitas/{id}', [App\Http\Controllers\TempatController::class, 'deleteFasilitas'])->name('deleteFasilitas');

Route::post('/post-wilayah', [App\Http\Controllers\TempatController::class, 'postWilayah'])->name('postWilayah');
Route::patch('/update-wilayah', [App\Http\Controllers\TempatController::class, 'editWilayah'])->name('editWilayah');
Route::get('/delete-wilayah/{id}', [App\Http\Controllers\TempatController::class, 'deleteWilayah'])->name('deleteWilayah');

Route::post('/post-kategori', [App\Http\Controllers\TempatController::class, 'postKategori'])->name('postKategori');
Route::patch('/update-kategori', [App\Http\Controllers\TempatController::class, 'editKategori'])->name('editKategori');
Route::get('/delete-kategori/{id}', [App\Http\Controllers\TempatController::class, 'deleteKategori'])->name('deleteKategori');

Route::post('/post-tempat', [App\Http\Controllers\TempatController::class, 'postTempat'])->name('postTempat');
Route::patch('/update-tempat', [App\Http\Controllers\TempatController::class, 'editTempat'])->name('editTempat');
Route::post('/post-galeri/{id}', [App\Http\Controllers\TempatController::class, 'postGaleri'])->name('postGaleri');
Route::get('/galeri-tempat/{id}', [App\Http\Controllers\TempatController::class, 'galeriTempat'])->name('galeriTempat');
Route::get('/delete-tempat/{id}', [App\Http\Controllers\TempatController::class, 'deleteTempat'])->name('deleteTempat');
Route::get('/delete-galeri/{id}', [App\Http\Controllers\TempatController::class, 'deleteGaleri'])->name('deleteGaleri');

Route::get('/get-fasilitas/{id}', [App\Http\Controllers\ApiController::class, 'getFasilitasById'])->name('GetFasilitas');
Route::get('/get-wilayah/{id}', [App\Http\Controllers\ApiController::class, 'getWilayahById'])->name('getWilayah');
Route::get('/get-kategori/{id}', [App\Http\Controllers\ApiController::class, 'getKategoriById'])->name('getKategori');
Route::get('/get-tempat/{id}', [App\Http\Controllers\ApiController::class, 'getTempatById'])->name('getTempat');
Route::get('/get-total-kunjungan', [App\Http\Controllers\ApiController::class, 'getTotalKunjungan'])->name('getTotalKunjungan');
Route::get('/get-tempat/{wilayah}/{kategori}', [App\Http\Controllers\ApiController::class, 'getTempat'])->name('getTempat');
