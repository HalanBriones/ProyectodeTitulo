<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('idServicio');
            $table->string('nombre_servicio');
            $table->string('descripcion');
            $table->string('precioSventa');
            $table->string('precioScosto');
            $table->integer('idTcs')->unsigned();
            $table->foreign('idTcs')->references('idTcs')->on('tipo_comercializacion_ser');
            $table->integer('idTipoServicio')->unsigned();
            $table->foreign('idTipoServicio')->references('idTipoServicio')->on('tipo_servicio');
            $table->integer('idConocimiento')->unsigned();
            $table->foreign('idConocimiento')->references('idConocimiento')->on('conocimiento_servicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios');
    }
}
