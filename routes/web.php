<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporBanjirController;
use App\Http\Controllers\LaporanController;

// Halaman form laporan
Route::get('/', [LaporBanjirController::class, 'index'])
    ->name('form');

// Proses pengiriman laporan dari form utama
Route::post('/laporan/simpan', [LaporBanjirController::class, 'proses'])
    ->name('laporan.proses');

// Fitur CRUD laporan
Route::resource('laporan', LaporanController::class);