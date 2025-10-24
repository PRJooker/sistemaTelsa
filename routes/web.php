<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutasController;
use App\Http\Controllers\TipoTransporteController;
use App\Http\Controllers\TarifaController;
use App\Http\Controllers\TipoGastoController;
use App\Http\Controllers\CategoriaGastoController;


Route::redirect('/', '/admin');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // -----------------------------------
    // Rutas de Administrativo - Gastos
    // -----------------------------------
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('administrativo')->name('administrativo.')->group(function () {

            // ---------------------------
            // Categorías de Gastos
            // ---------------------------
            Route::get('categorias-gastos', [CategoriaGastoController::class, 'index'])
                ->name('categoriasgastos.index');
            Route::get('categorias-gastos/create', [CategoriaGastoController::class, 'create'])
                ->name('categoriasgastos.create');
            Route::post('categorias-gastos', [CategoriaGastoController::class, 'store'])
                ->name('categoriasgastos.store');
            Route::get('categorias-gastos/{categoriaGasto}/edit', [CategoriaGastoController::class, 'edit'])
                ->name('categoriasgastos.edit');
            Route::put('categorias-gastos/{categoriaGasto}', [CategoriaGastoController::class, 'update'])
                ->name('categoriasgastos.update');
            Route::delete('categorias-gastos/{categoriaGasto}', [CategoriaGastoController::class, 'destroy'])
                ->name('categoriasgastos.destroy');
            
            // ---------------------------
            // Tipos de Gastos (por Categoría)
            // ---------------------------
            Route::get('tipos-gastos', [TipoGastoController::class, 'index'])
                ->name('tiposgastos.index');
            Route::get('tipos-gastos/create', [TipoGastoController::class, 'create'])
                ->name('tiposgastos.create');
            Route::post('tipos-gastos', [TipoGastoController::class, 'store'])
                ->name('tiposgastos.store');
            Route::get('tipos-gastos/{tipoGasto}/edit', [TipoGastoController::class, 'edit'])
                ->name('tiposgastos.edit');
            Route::put('tipos-gastos/{tipoGasto}', [TipoGastoController::class, 'update'])
                ->name('tiposgastos.update');
            Route::delete('tipos-gastos/{tipoGasto}', [TipoGastoController::class, 'destroy'])
                ->name('tiposgastos.destroy');
        });
    });

    // -----------------------------------
    // Rutas de Operativo - Rutas
    // -----------------------------------
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('operativo')->name('operativo.')->group(function () {

            Route::get('rutas', [RutasController::class, 'index'])->name('rutas.index');
            Route::get('rutas/create', [RutasController::class, 'create'])->name('rutas.create');
            Route::post('rutas', [RutasController::class, 'store'])->name('rutas.store');
            Route::get('rutas/{id}/edit', [RutasController::class, 'edit'])->name('rutas.edit');
            Route::put('rutas/{id}', [RutasController::class, 'update'])->name('rutas.update');
            Route::delete('rutas/{id}', [RutasController::class, 'destroy'])->name('rutas.destroy');
            Route::patch('rutas/{id}/toggle', [RutasController::class, 'toggle'])->name('rutas.toggle');

            // Tipos de Transporte
            Route::get('tipos-transporte', [TipoTransporteController::class, 'index'])
                ->name('tipotransporte.index');
            Route::get('tipos-transporte/create', [TipoTransporteController::class, 'create'])
                ->name('tipotransporte.create');
            Route::post('tipos-transporte', [TipoTransporteController::class, 'store'])
                ->name('tipotransporte.store');
            Route::get('tipos-transporte/{tipoTransporte}/edit', [TipoTransporteController::class, 'edit'])
                ->name('tipotransporte.edit');
            Route::put('tipos-transporte/{tipoTransporte}', [TipoTransporteController::class, 'update'])
                ->name('tipotransporte.update');
            Route::delete('tipos-transporte/{tipoTransporte}', [TipoTransporteController::class, 'destroy'])
                ->name('tipotransporte.destroy');
            Route::patch('tipos-transporte/{id}/restore', [TipoTransporteController::class, 'restore'])
                ->name('tipotransporte.restore');

            // Tarifas
            Route::get('tarifas', [TarifaController::class, 'index'])->name('tarifas.index');
            Route::get('tarifas/create', [TarifaController::class, 'create'])->name('tarifas.create');
            Route::post('tarifas', [TarifaController::class, 'store'])->name('tarifas.store');
            Route::get('tarifas/{tarifa}/edit', [TarifaController::class, 'edit'])->name('tarifas.edit');
            Route::put('tarifas/{tarifa}', [TarifaController::class, 'update'])->name('tarifas.update');
            Route::delete('tarifas/{tarifa}', [TarifaController::class, 'destroy'])->name('tarifas.destroy');
        });
    });

});
