<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('idPro');
            $table->string('sku')->unique();
            $table->string('partNumber')->unique();
            $table->string('nombre_producto');
            $table->string('descripcion');
            $table->string('configuracion');
            $table->float('precioPventa');
            $table->float('precioPcosto');
            $table->integer('idMarca')->unsigned();
            $table->foreign('idMarca')->references('idMarca')->on('mac');
            $table->integer('idProHW')->unsigned();
            $table->foreign('idProHW')->references('idProHW')->on('tipo_producto_hw');
            $table->integer('idProSW')->unsigned();
            $table->foreign('idProSW')->references('idProSW')->on('tipo_producto_sw');
            $table->integer('idTcp')->unsigned();
            $table->foreign('idTcp')->references('idTcp')->on('tipo_comercializacion_pro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
