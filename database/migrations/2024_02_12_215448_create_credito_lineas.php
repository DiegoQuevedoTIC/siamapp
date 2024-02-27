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
        Schema::create('credito_lineas', function (Blueprint $table) {
            $table->id();
            $table->integer('linea');
            $table->string('descripcion');
            $table->unsignedBigInteger('clasificacion');
            $table->unsignedBigInteger('tipo_garantia');
            $table->unsignedBigInteger('tipo_inversion');
            $table->unsignedBigInteger('moneda')->nullable();
            $table->unsignedBigInteger('periodo_pago')->nullable();
            $table->float('interes_cte')->default(0)->nullable();
            $table->float('interes_mora')->default(0)->nullable();
            $table->string('tipo_cuota')->nullable();
            $table->string('tipo_tasa')->nullable();
            $table->integer('nro_cuotas_max')->nullable();
            $table->integer('nro_cuotas_gracia')->default(0);
            $table->integer('cant_gar_real')->nullable();
            $table->integer('cant_gar_pers')->nullable();
            $table->float('monto_min')->nullable();
            $table->float('monto_max')->nullable();
            $table->string('abonos_extra')->nullable();
            $table->integer('ciius')->nullable();
            $table->string('subcentro')->nullable();

            $table->foreign('moneda')->references('id')->on('monedas');
            $table->foreign('clasificacion')->references('id')->on('clasificacion_creditos');
            $table->foreign('tipo_inversion')->references('id')->on('tipo_inversiones');
            $table->foreign('tipo_garantia')->references('id')->on('tipo_garantias');
            $table->foreign('periodo_pago')->references('id')->on('pago_periodos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credito_lineas');
    }
};
