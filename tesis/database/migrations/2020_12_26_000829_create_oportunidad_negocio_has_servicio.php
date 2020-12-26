<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOportunidadNegocioHasServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oportunidad_negocio_has_servicio', function (Blueprint $table) {
            $table->integer('idNegocio')->unsigned();
            $table->foreign('idNegocio')->references('idNegocio')->on('oportunidad_negocio');
            $table->integer('idServicio')->unsigned();
            $table->foreign('idServicio')->references('idServicio')->on('servicio');
            $table->float('precioSventa');
            $table->float('precioScosto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oportunidad_negocio_has_servicio');
    }
}
