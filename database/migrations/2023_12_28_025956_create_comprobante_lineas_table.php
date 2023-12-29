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
        Schema::create('comprobante_lineas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pucs_id');
            $table->foreign('pucs_id')->on('pucs')->references('id');
            $table->string('tercero_registro', 50);
            $table->string('descripcion_linea', 400);
            $table->decimal('debito', 12, 2)->nullable();
            $table->decimal('credito', 12, 2)->nullable();
            $table->unsignedBigInteger('comprobante_id');
            $table->foreign('comprobante_id')->on('comprobantes')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprobante_lineas');
    }
};
