<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporBanjirController;


Route::get('/', [LaporBanjirController::class, 'index'])
    ->name('form');


Route::post('/laporan', [LaporBanjirController::class, 'proses'])
    ->name('laporan.proses');


Route::get('/laporan', [LaporBanjirController::class, 'laporan'])
    ->name('laporan.index');
