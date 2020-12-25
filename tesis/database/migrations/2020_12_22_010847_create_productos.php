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
            $table->integer('idTipoProducto')->unsigned();
            $table->foreign('idTipoProducto')->references('idTipoProducto')->on('tipo_producto');
            $table->integer('idComercializacion')->unsigned();
            $table->foreign('idComercializacion')->references('idComercializacion')->on('comercializacion');
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
