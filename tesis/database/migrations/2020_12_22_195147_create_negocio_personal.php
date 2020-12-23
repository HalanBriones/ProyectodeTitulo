<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNegocioPersonal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negocio_personal', function (Blueprint $table) {
            $table->integer('idNegocio')->unsigned();
            $table->foreign('idNegocio')->references('idNegocio')->on('oportunidad_negocio');
            $table->string('rut');
            $table->foreign('rut')->references('rut')->on('users');
            $table->date('creacion_negocio');
            $table->string('propietario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('negocio_personal');
    }
}
