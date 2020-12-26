<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TipoProductoHasComercializacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_producto_has_comercializacion', function (Blueprint $table) {
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
        Schema::dropIfExists('tipo_producto_has_comercializacion');
    }
}
