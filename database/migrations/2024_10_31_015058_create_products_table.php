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
        Schema::create('products', function (Blueprint $table) {
            $table->id()->comment('Identificador único del producto (auto-incremental)'); // ID del producto
            $table->string('name')->comment('Nombre del producto'); // Nombre del producto
            $table->string('sku')->unique()->comment('SKU o código único que identifica al producto, no puede repetirse'); // SKU único
            $table->date('expiry_date')->comment('Fecha de caducidad del producto'); // Fecha de caducidad
            $table->timestamps(); // Timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products'); // Eliminar la tabla products si se revierte la migración
    }
};
