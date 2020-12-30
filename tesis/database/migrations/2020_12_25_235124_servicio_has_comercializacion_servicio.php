<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ServicioHasComercializacionServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_has_comercializacionServicio', function (Blueprint $table) {
            $table->integer('idComer_servicio')->unsigned();
            $table->foreign('idComer_servicio')->references('idComer_servicio')->on('comercializacion_servicio');
            $table->integer('idServicio')->unsigned();
            $table->foreign('idServicio')->references('idServicio')->on('servicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
