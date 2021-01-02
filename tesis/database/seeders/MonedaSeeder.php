<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonedaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('moneda')->insert([
            'nombre' => 'Euro'
        ]);

        DB::table('moneda')->insert([
            'nombre' => 'Peso Chileno'
        ]);

        DB::table('moneda')->insert([
            'nombre' => 'Dolar'
        ]);
    }
}
