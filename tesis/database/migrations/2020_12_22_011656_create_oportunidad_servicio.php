<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOportunidadServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oportunidad_servicio', function (Blueprint $table) {
            $table->integer('idServicio')->unsigned();
            $table->integer('idNegocio')->unsigned();

            $table->foreign('idServicio')->references('idServicio')->on('servicios');
            $table->foreign('idNegocio')->references('idNegocio')->on('oportunidad_negocio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oportunidad_servicio');
    }
}
