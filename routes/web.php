<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ArsipController;

Route::get('/', function () {
    return redirect()->route('arsip.index');
});
Route::get('/halaman', function () {
    return view('layout.app');
});
Route::get('/about', function () {
    return view('pages.about.identitas');
})->name('about');

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip.index');
Route::get('/arsip/create', [ArsipController::class, 'create'])->name('arsip.create');
Route::post('/arsip', [ArsipController::class, 'store'])->name('arsip.store');
Route::get('/arsip/{arsip}/edit', [ArsipController::class, 'edit'])->name('arsip.edit');
Route::put('/arsip/{arsip}', [ArsipController::class, 'update'])->name('arsip.update');
Route::delete('/arsip/{arsip}', [ArsipController::class, 'destroy'])->name('arsip.destroy');
Route::get('/arsip/{arsip}/view', [ArsipController::class, 'show'])->name('arsip.show');


Route::get('/arsip/{arsip}/download', [ArsipController::class, 'download'])->name('arsip.download');
Route::get('/arsip/{arsip}/edit-file', [ArsipController::class, 'editFile'])->name('arsip.editFile');
Route::post('/arsip/{arsip}/update-file', [ArsipController::class, 'updateFile'])->name('arsip.updateFile');
