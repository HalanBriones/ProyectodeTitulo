<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOportunidadNegocio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oportunidad_negocio', function (Blueprint $table) {
            $table->increments('idNegocio');
            $table->string('nombre_negocio');
            $table->string('siglas')->unique();
            $table->string('descripcion');
            $table->float('precio_final');
            $table->float('margen');
            $table->integer('idEstado')->unsigned();
            $table->foreign('idEstado')->references('idEstado')->on('estado');
            $table->integer('idTipoNegocio')->unsigned();
            $table->foreign('idTipoNegocio')->references('idTipoNegocio')->on('tipo_negocio');
            $table->integer('idMoneda')->unsigned();
            $table->foreign('idMoneda')->references('idMoneda')->on('tipo_moneda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oportunidad_negocio');
    }
}
