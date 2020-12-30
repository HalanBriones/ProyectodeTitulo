<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoComercializacionServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comercializacion_servicio')->insert([
            'idComer_servicio' => 1,
            'nombre_comercializacion_ser' =>'outsorcing',
            'valor'=> 150000
        ]);

        DB::table('comercializacion_servicio')->insert([
            'idComer_servicio' => 2,
            'nombre_comercializacion_ser' =>'bolsa valores',
            'valor'=> 150000
        ]);
    }

}
