<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'rut' => '20.034.318-2',
            'nombre' => 'Halan',
            'apellido' => 'Briones',
            'email' => 'halanbm98@gmail.com',
            'password' => Hash::make('olakase1998'),
            'telefono' => '975467938',
            'idPerfil' => 1
        ]);
    }
}
