<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViajesController;

Route::redirect('/', '/admin');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // ------------------------------
    // Rutas de Operativo - Viajes
    // ------------------------------
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('operativo')->name('operativo.')->group(function () {

            // Listado de viajes
            Route::get('viajes', [ViajesController::class, 'index'])->name('viajes.index');

            // Crear viaje
            Route::get('viajes/create', [ViajesController::class, 'create'])->name('viajes.create');
            Route::post('viajes', [ViajesController::class, 'store'])->name('viajes.store');

            // Editar viaje
            Route::get('viajes/{id}/edit', [ViajesController::class, 'edit'])->name('viajes.edit');
            Route::put('viajes/{id}', [ViajesController::class, 'update'])->name('viajes.update');

            // Borrado lógico
            Route::delete('viajes/{id}', [ViajesController::class, 'destroy'])->name('viajes.destroy');

            // Activar / Desactivar viaje
            Route::patch('viajes/{id}/toggle', [ViajesController::class, 'toggle'])->name('viajes.toggle');
        });
    });

});
