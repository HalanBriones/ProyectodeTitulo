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
        Schema::create('servicio', function (Blueprint $table) {
            $table->increments('idServicio');
            $table->string('nombre_servicio');
            $table->string('descripcion');
            $table->integer('idTipoServicio')->unsigned();
            $table->foreign('idTipoServicio')->references('idTipoServicio')->on('tipo_servicio');
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
