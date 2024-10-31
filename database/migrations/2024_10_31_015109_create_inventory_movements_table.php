<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     */
    public function up(): void
    {
        Schema::create('inventory_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
                ->constrained()
                ->onDelete('cascade') // Elimina movimientos cuando se elimina el producto
                ->comment('Relación con el producto');
            $table->enum('type', ['entry', 'exit'])->comment('Tipo de movimiento (entrada o salida)');
            $table->integer('quantity')->comment('Cantidad de producto en el movimiento');
            $table->date('movement_date')->comment('Fecha del movimiento');
            $table->string('description')->nullable()->comment('Descripción o motivo del movimiento');
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_movements');
    }
};
