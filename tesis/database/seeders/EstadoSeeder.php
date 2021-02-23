<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado')->insert([
            "nombre_estado" => 'Gestionando negocio'
        ]);

        DB::table('estado')->insert([
            "nombre_estado" => 'Envio de cotizacón'
        ]);

        DB::table('estado')->insert([
            "nombre_estado" => 'Negocio Postergado'
        ]);

        DB::table('estado')->insert([
            "nombre_estado" => 'Negocio Aceptado'
        ]);

        DB::table('estado')->insert([
            "nombre_estado" => 'Negocio Rechazado'
        ]);

    }
}
