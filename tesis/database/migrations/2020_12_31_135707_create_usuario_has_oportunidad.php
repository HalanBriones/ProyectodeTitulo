<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioHasOportunidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_has_oportunidad', function (Blueprint $table) {
            $table->integer('idNegocio')->unsigned();
            $table->foreign('idNegocio')->references('idNegocio')->on('oportunidad_negocio');
            $table->string('rut');
            $table->foreign('rut')->references('rut')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_has_oportunidad');
    }
}
