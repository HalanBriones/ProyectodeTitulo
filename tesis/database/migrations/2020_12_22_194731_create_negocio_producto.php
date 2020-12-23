<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNegocioProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negocio_producto', function (Blueprint $table) {
            $table->integer('idNegocio')->unsigned();
            $table->foreign('idNegocio')->references('idNegocio')->on('oportunidad_negocio');
            $table->integer('idPro')->unsigned();
            $table->foreign('idPro')->references('idPro')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('negocio_producto');
    }
}
