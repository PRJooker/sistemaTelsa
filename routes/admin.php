<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('admin.dashboard');
})->name('dashboard');


// Rutas para la sección Operativo
Route::prefix('operativo')->group(function () {
    Route::get('/', [OperativoController::class, 'index'])->name('operativo.index');
    Route::get('/create', [OperativoController::class, 'create'])->name('operativo.create');
    Route::post('/store', [OperativoController::class, 'store'])->name('operativo.store');
});