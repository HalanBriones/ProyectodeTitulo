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
            "nombre_estado" => 'Fase 1:Creación Negocio'
        ]);

        DB::table('estado')->insert([
            "nombre_estado" => 'Fase 2:Inserción Productos, Servicios y Participantes'
        ]);

        DB::table('estado')->insert([
            "nombre_estado" => 'Fase 3:Subida de archivos'
        ]);
    }
}
