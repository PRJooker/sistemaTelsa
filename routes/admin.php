<?php

use Illuminate\Support\Facades\Route;

// ================================
// IMPORTACIÓN DE CONTROLADORES
// ================================
use App\Http\Controllers\RH\AreasController;
use App\Http\Controllers\RH\DepartamentosController;
use App\Http\Controllers\RH\PuestosController;
use App\Http\Controllers\RH\EmpleadosController;

use App\Http\Controllers\Operativo\RutasController;
use App\Http\Controllers\Operativo\TipoTransporteController;
use App\Http\Controllers\Operativo\TarifaController;
use App\Http\Controllers\Administracion\TipoGastoController;
use App\Http\Controllers\Administracion\CategoriaGastoController;

// ================================
// DASHBOARD PRINCIPAL
// ================================
Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

// ================================
// MÓDULO RH
// ================================
// Route::resource('areas', AreasController::class)->except(['show']);
// Route::resource('departamentos', DepartamentosController::class)->except(['show']);
// Route::resource('puestos', PuestosController::class)->except(['show']);
// Route::resource('empleados', EmpleadosController::class)->except(['show']);

// ================================
// MÓDULO ADMINISTRATIVO - GASTOS
// ================================
Route::resource('categorias-gastos', CategoriaGastoController::class)->except(['show']);
Route::resource('tipos-gastos', TipoGastoController::class)->except(['show']);

// ================================
// MÓDULO OPERATIVO
// ================================

// Rutas
Route::resource('rutas', RutasController::class)->except(['show']);
Route::patch('rutas/{id}/toggle', [RutasController::class, 'toggle'])->name('rutas.toggle');

// Tipos de Transporte
Route::resource('tipos-transporte', TipoTransporteController::class)->except(['show']);
Route::patch('tipos-transporte/{id}/restore', [TipoTransporteController::class, 'restore'])->name('tipotransporte.restore');

// Tarifas
Route::resource('tarifas', TarifaController::class)->except(['show']);
