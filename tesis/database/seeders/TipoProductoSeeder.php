<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_producto')->insert([
            'idTipoProducto' => 1,
            'nombre_tipo_producto' => 'Hardware'
        ]);

        DB::table('tipo_producto')->insert([
            'idTipoProducto' => 2,
            'nombre_tipo_producto' => 'Software'
        ]);
    }
}
