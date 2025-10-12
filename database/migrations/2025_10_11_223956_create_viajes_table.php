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
        Schema::create('viajes', function (Blueprint $table) {
            $table->bigIncrements('IdViaje'); 
            $table->string('Origen');
            $table->string('Destino');

            $table->boolean('FlagActivo')->default(true);
            $table->boolean('FlagBorradoLogico')->default(false);

            $table->unsignedBigInteger('UserCreacion'); 
            $table->timestamp('FechaCreacion')->useCurrent(); 

            $table->unsignedBigInteger('UserModificacion')->nullable(); 
            $table->timestamp('FechaModificacion')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viajes');
    }
};
