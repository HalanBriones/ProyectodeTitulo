<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rol')->insert([
            'idRol' => 1,
            'nombre_rol' => 'Administrador'
        ]);

        DB::table('rol')->insert([
            'idRol' => 2,
            'nombre_rol' => 'Tecnico'
        ]);

        DB::table('rol')->insert([
            'idRol' => 3,
            'nombre_rol' => 'Comercial'
        ]);

        DB::table('rol')->insert([
            'idRol' => 4,
            'nombre_rol' => 'Usuario'
        ]);
    }
}
