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
            'nombre' => 'Administrador'
        ]);

        DB::table('perfil')->insert([
            'idPerfil' => 2,
            'nombre' => 'Tecnico'
        ]);

        DB::table('perfil')->insert([
            'idPerfil' => 3,
            'nombre' => 'Comercial'
        ]);

        DB::table('perfil')->insert([
            'idPerfil' => 4,
            'nombre' => 'Usuario'
        ]);
    }
}
