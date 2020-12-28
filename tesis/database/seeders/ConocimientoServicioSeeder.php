<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConocimientoServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conocimiento_servicio')->insert([
            'idConocimiento' => 1,
            'nombre_conocimiento' => 'Junior',
            'valor_conocimiento' => 15000
        ]);

        DB::table('conocimiento_servicio')->insert([
            'idConocimiento' => 2,
            'nombre_conocimiento' => 'Senior',
            'valor_conocimiento' => 19000
        ]);

        DB::table('conocimiento_servicio')->insert([
            'idConocimiento' => 3,
            'nombre_conocimiento' => 'Experto',
            'valor_conocimiento' => 20000
        ]);
    }
}
