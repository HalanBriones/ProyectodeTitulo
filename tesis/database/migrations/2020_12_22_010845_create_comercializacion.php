<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComercializacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comercializacion', function (Blueprint $table) {
            $table->increments('idComercializacion');
            $table->string('nombre_comercializacion');
            $table->float('valor');
            $table->integer('idTipoComercializacion')->unsigned();
            $table->foreign('idTipoComercializacion')->references('idTipoComercializacion')->on('tipo_comercializacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comercializacion');
    }
}
