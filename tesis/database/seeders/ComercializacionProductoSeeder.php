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
        DB::table('comercializacion')->insert([
            'nombre_comercializacion' => 'Suscripcion',
            'valor' => '20000'
        ]);

        DB::table('comercializacion')->insert([
            'nombre_comercializacion' => 'Arriendo',
            'valor' => '25000'
        ]);

        DB::table('comercializacion')->insert([
            'nombre_comercializacion' => 'Proyecto',
            'valor' => '29000'
        ]);

        DB::table('comercializacion')->insert([
            'nombre_comercializacion' => 'Venta Transaccional',
            'valor' => '30000'
        ]);

        DB::table('comercializacion')->insert([
            'nombre_comercializacion' => 'Renovacion',
            'valor' => '20000'
        ]);
        
        DB::table('comercializacion')->insert([
            'nombre_comercializacion' => 'Leasing A',
            'valor' => '16000'
        ]);

        DB::table('comercializacion')->insert([
            'nombre_comercializacion' => 'Leasing B',
            'valor' => '32000'
        ]);
    }
}
