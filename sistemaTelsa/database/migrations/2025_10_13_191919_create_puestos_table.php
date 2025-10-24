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
        Schema::create('puestos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('descripcion_puesto')->nullable();
            $table->integer('num_plazas')->nullable();
            $table->decimal('salario_puesto', 10, 2)->nullable();
            $table->foreignId('departamento_id')
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
        Schema::dropIfExists('puestos');
    }
};
