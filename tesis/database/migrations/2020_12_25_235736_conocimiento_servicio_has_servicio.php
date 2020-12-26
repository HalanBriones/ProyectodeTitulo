<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConocimientoServicioHasServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conocimiento_servicio_has_servicio', function (Blueprint $table) {
            $table->integer('idConocimiento')->unsigned();
            $table->foreign('idConocimiento')->references('idConocimiento')->on('conocimiento_servicio');
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
        Schema::dropIfExists('conocimiento_servicio_has_servicio');
    }
}
