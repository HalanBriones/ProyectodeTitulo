<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfil')->insert([
            'idPerfil' => 1,
            'nombre_perfil' => 'Administrador'
        ]);

        DB::table('perfil')->insert([
            'idPerfil' => 2,
            'nombre_perfil' => 'Tecnico'
        ]);

        DB::table('perfil')->insert([
            'idPerfil' => 3,
            'nombre_perfil' => 'Comercial'
        ]);

        DB::table('perfil')->insert([
            'idPerfil' => 4,
            'nombre_perfil' => 'Usuario'
        ]);
    }
}
