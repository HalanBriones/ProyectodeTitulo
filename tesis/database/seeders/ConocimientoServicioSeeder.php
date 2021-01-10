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
            'nombre_conocimiento' => 'Junior'
        ]);

        DB::table('conocimiento_servicio')->insert([
            'nombre_conocimiento' => 'Senior'
        ]);

        DB::table('conocimiento_servicio')->insert([
            'nombre_conocimiento' => 'Experto'
        ]);
    }
}
