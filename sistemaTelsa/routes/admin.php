<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RH\AreasController;
use App\Http\Controllers\RH\DepartamentosController;
use App\Http\Controllers\RH\PuestosController;
use App\Http\Controllers\RH\EmpleadosController;

Route::get('/', function () {
   return view('admin.dashboard');
})->name('dashboard');

Route::resource('areas', AreasController::class)->except(['show']);
Route::resource('departamentos', DepartamentosController::class)->except(['show']);
Route::resource('puestos', PuestosController::class)->except(['show']);
Route::resource('empleados', EmpleadosController::class)->except(['show']);
