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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa', 10);
            $table->string('nchasis', 20);
            $table->string('nmotor', 20);
            $table->string('marca', 30);
            $table->string('modelo', 30);
            $table->string('tipo', 30);
            $table->string('kilometraje');
            $table->float('precio');
            $table->string('año');
            $table->string('details1')->nullable();
            $table->string('details2')->nullable();
            $table->string('details3')->nullable();
            $table->binary('image')->nullable();
            $table->integer('stock')->nulleable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
