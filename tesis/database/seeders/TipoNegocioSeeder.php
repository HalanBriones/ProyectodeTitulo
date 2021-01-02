<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoNegocioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_negocio')->insert([
            'nombre_tipo_negocio' => 'Tipo Negocio 1'
        ]);

        DB::table('tipo_negocio')->insert([
            'nombre_tipo_negocio' => 'Tipo Negocio 2'
        ]);

        DB::table('tipo_negocio')->insert([
            'nombre_tipo_negocio' => 'Tipo Negocio 3'
        ]);
    }
}
