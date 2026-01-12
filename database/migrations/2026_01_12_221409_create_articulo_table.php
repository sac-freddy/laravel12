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
        Schema::create('articulo', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('descriptionen');
            $table->string('descripcionsunat');
            $table->string('modelo');
            $table->string('modeloimport');
            $table->integer('marca_id');
            $table->integer('proveedor_id');
            $table->integer('unidadmedida_id');
            $table->integer('sunatundmedida_id');
            $table->integer('sunatcodigo_id');
            $table->decimal('precioventa', 12, 4);
            $table->decimal('preciocompra')->nullable();
            $table->integer('tipoarticulo_id');
            $table->integer('origenarticulo')->nullable();
            $table->integer('moneda_id');
            $table->integer('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulo');
    }
};
