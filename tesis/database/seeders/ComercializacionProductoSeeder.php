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
            'nombre_comercializacion' => 'Suscripcion'
        ]);

        DB::table('comercializacion_producto')->insert([
            'nombre_comercializacion' => 'Arriendo'
        ]);

        DB::table('comercializacion_producto')->insert([
            'nombre_comercializacion' => 'Proyecto'
        ]);

        DB::table('comercializacion_producto')->insert([
            'nombre_comercializacion' => 'Venta Transaccional'
        ]);

        DB::table('comercializacion_producto')->insert([
            'nombre_comercializacion' => 'Renovacion'
        ]);
        
        DB::table('comercializacion_producto')->insert([
            'nombre_comercializacion' => 'Leasing A'
        ]);

        DB::table('comercializacion_producto')->insert([
            'nombre_comercializacion' => 'Leasing B'
        ]);
    }
}
