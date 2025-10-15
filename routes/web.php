<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutasController;
use App\Http\Controllers\TipoTransporteController;
use App\Http\Controllers\TarifaController;

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

    // ------------------------------
    // Rutas de Operativo - Rutas
    // ------------------------------
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('operativo')->name('operativo.')->group(function () {

            Route::get('rutas', [RutasController::class, 'index'])->name('rutas.index');
            Route::get('rutas/create', [RutasController::class, 'create'])->name('rutas.create');
            Route::post('rutas', [RutasController::class, 'store'])->name('rutas.store');
            Route::get('rutas/{id}/edit', [RutasController::class, 'edit'])->name('rutas.edit');
            Route::put('rutas/{id}', [RutasController::class, 'update'])->name('rutas.update');
            Route::delete('rutas/{id}', [RutasController::class, 'destroy'])->name('rutas.destroy');
            Route::patch('rutas/{id}/toggle', [RutasController::class, 'toggle'])->name('rutas.toggle');

        });
    });

    // ------------------------------
    // Rutas de Operativo - Tipos de Transporte
    // ------------------------------
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('operativo')->name('operativo.')->group(function () {

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

        });
    });
    
     // -----------------------------------
    // Rutas de Operativo - Tarifas
    // ------------------------------------
    Route::prefix('admin')->name('admin.')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::prefix('operativo')->name('operativo.')->group(function () {

        // ---------------------------
        // Tarifas
        // ---------------------------
        Route::get('tarifas', [TarifaController::class, 'index'])->name('tarifas.index');
        Route::get('tarifas/create', [TarifaController::class, 'create'])->name('tarifas.create');
        Route::post('tarifas', [TarifaController::class, 'store'])->name('tarifas.store');

        // Editar / Actualizar
        Route::get('tarifas/{tarifa}/edit', [TarifaController::class, 'edit'])->name('tarifas.edit');
        Route::put('tarifas/{tarifa}', [TarifaController::class, 'update'])->name('tarifas.update');

        // Eliminar
        Route::delete('tarifas/{tarifa}', [TarifaController::class, 'destroy'])->name('tarifas.destroy');
    });

});

});
