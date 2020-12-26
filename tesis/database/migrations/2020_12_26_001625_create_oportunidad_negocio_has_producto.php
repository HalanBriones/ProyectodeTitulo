<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOportunidadNegocioHasProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oportunidad_negocio_has_producto', function (Blueprint $table) {
            $table->integer('idPro')->unsigned();
            $table->foreign('idPro')->references('idPro')->on('producto');
            $table->integer('idNegocio')->unsigned();
            $table->foreign('idNegocio')->references('idNegocio')->on('oportunidad_negocio');
            $table->string('sku')->unique();
            $table->string('partNumber')->unique();
            $table->string('configuracion');
            $table->float('precioPventa');
            $table->float('precioPcosto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oportunidad_negocio_has_producto');
    }
}
