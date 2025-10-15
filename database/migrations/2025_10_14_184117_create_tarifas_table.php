<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tarifas', function (Blueprint $table) {
            $table->id();

            // Relaciones principales
            $table->unsignedBigInteger('ruta_id');
            $table->unsignedBigInteger('tipo_transporte_id');

            // Campos principales
            $table->decimal('monto', 10, 2);

           
            $table->unsignedBigInteger('usuario_creo')->nullable();
            $table->unsignedBigInteger('usuario_actualizo')->nullable();

            // Fechas y soft delete
            $table->timestamps();
            $table->softDeletes();

            // Llaves foráneas
            $table->foreign('ruta_id')->references('id')->on('rutas')->onDelete('cascade');
            $table->foreign('tipo_transporte_id')->references('id')->on('tipos_transporte')->onDelete('cascade');
            $table->foreign('usuario_creo')->references('id')->on('users')->onDelete('set null');
            $table->foreign('usuario_actualizo')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tarifas');
    }
};
