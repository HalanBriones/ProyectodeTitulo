<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComercializacionProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comercializacion_producto')->insert([
            'idcomercializacion_producto' => 1,
            'nombre_comercializacion' => 'Suscripcion'
        ]);
        DB::table('comercializacion_producto')->insert([
            'idcomercializacion_producto' => 2,
            'nombre_comercializacion' => 'Venta Transaccional'
        ]);

        DB::table('comercializacion_producto')->insert([
            'idcomercializacion_producto' => 3,
            'nombre_comercializacion' => 'Renovacion'
        ]);
        
        DB::table('comercializacion_producto')->insert([
            'idcomercializacion_producto' => 4,
            'nombre_comercializacion' => 'Leasing A(arriendo)'
        ]);

        DB::table('comercializacion_producto')->insert([
            'idcomercializacion_producto' => 5,
            'nombre_comercializacion' => 'Leasing B'
        ]);
    }
}
