<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tipos_transporte', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_transporte')->unique();
            $table->text('descripcion_transporte')->nullable();
            
            // Usuario que creó y actualizó el registro
            $table->unsignedBigInteger('usuario_creo')->nullable();
            $table->unsignedBigInteger('usuario_actualizo')->nullable();

            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('usuario_creo')->references('id')->on('users')->onDelete('set null');
            $table->foreign('usuario_actualizo')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tipos_transporte');
    }
};
