<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComercializacionServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comercializacion_servicio')->insert([
            'nombre_comercializacion' =>'outsorcing'
        ]);

        DB::table('comercializacion_servicio')->insert([
            'nombre_comercializacion' =>'bolsa valores'
        ]);
    }
}
