<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoProductohasComercializacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //HARDWARE
        DB::table('tipo_producto_has_comercializacion_producto')->insert([
            "tipo_producto_idtipo_producto" => 1,
            "comercializacion_producto_idcomercializacion_producto" => 2
        ]);
        DB::table('tipo_producto_has_comercializacion_producto')->insert([
            "tipo_producto_idtipo_producto" => 1,
            "comercializacion_producto_idcomercializacion_producto" => 4
        ]);
        DB::table('tipo_producto_has_comercializacion_producto')->insert([
            "tipo_producto_idtipo_producto" => 1,
            "comercializacion_producto_idcomercializacion_producto" => 5
        ]);
        //SOFTWARE
        DB::table('tipo_producto_has_comercializacion_producto')->insert([
            "tipo_producto_idtipo_producto" => 2,
            "comercializacion_producto_idcomercializacion_producto" => 1
        ]);
        DB::table('tipo_producto_has_comercializacion_producto')->insert([
            "tipo_producto_idtipo_producto" => 2,
            "comercializacion_producto_idcomercializacion_producto" => 2
        ]);
        DB::table('tipo_producto_has_comercializacion_producto')->insert([
            "tipo_producto_idtipo_producto" => 2,
            "comercializacion_producto_idcomercializacion_producto" => 3
        ]);
        DB::table('tipo_producto_has_comercializacion_producto')->insert([
            "tipo_producto_idtipo_producto" => 2,
            "comercializacion_producto_idcomercializacion_producto" => 4
        ]);
    }
}
