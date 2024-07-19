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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('dni', 15);
            $table->string('apellido', 70);
            $table->string('nombre', 70);
            $table->string('correo');
            $table->string('telefono');
            $table->string('direccion')->nullable();
            $table->foreignId('vehiculo_id')->constrained('vehiculos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
