<?php

use App\Http\Controllers\AspirasiSiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AspirasiSiswaController::class, 'index'])->name('siswa.index');
Route::post('/', [AspirasiSiswaController::class, 'store'])->name('siswa.store');