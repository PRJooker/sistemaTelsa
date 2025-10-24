<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('apellido_ap')->nulleable();
            $table->string('apellido_ma')->nullable();
            $table->string('curp')->nulleable();
            $table->string('rfc')->nullable();
            $table->string('seguro_social')->nullable();
            $table->string('direccion')->nullable();
            $table->string('municipio')->nullable();
            $table->string('estado')->nullable();
            $table->string('telefono')->nullable();
            $table->foreignId('puesto_id')
                ->constrained()
                ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
