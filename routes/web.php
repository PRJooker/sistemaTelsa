<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutasController;

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
    // Rutas de Operativo - Rutas
    // ------------------------------
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('operativo')->name('operativo.')->group(function () {

            // Listado de rutas
            Route::get('rutas', [RutasController::class, 'index'])->name('rutas.index');

            // Crear nueva ruta
            Route::get('rutas/create', [RutasController::class, 'create'])->name('rutas.create');
            Route::post('rutas', [RutasController::class, 'store'])->name('rutas.store');

            // Editar ruta
            Route::get('rutas/{id}/edit', [RutasController::class, 'edit'])->name('rutas.edit');
            Route::put('rutas/{id}', [RutasController::class, 'update'])->name('rutas.update');

            // Soft delete (borrado lógico)
            Route::delete('rutas/{id}', [RutasController::class, 'destroy'])->name('rutas.destroy');

            // Activar / Desactivar (si decides implementar)
            Route::patch('rutas/{id}/toggle', [RutasController::class, 'toggle'])->name('rutas.toggle');
        });
    });

});
