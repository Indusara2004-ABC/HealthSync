<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/doctors', [DoctorController::class, 'index']);

Route::post('/doctors', [DoctorController::class, 'store'])->name('doctors.store');

Route::put('/doctors/{doctor}', [DoctorController::class, 'update'])
    ->name('doctors.update');

Route::delete('/doctors/{doctor}', [DoctorController::class, 'destroy'])
    ->name('doctors.destroy');


