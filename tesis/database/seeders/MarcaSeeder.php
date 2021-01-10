<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mac')->insert([
            'nombre_marca' => 'IBM'
        ]);

        DB::table('mac')->insert([
            'nombre_marca' => 'Microsoft'
        ]);

        DB::table('mac')->insert([
            'nombre_marca' => 'Lenovo'
        ]);
    }
}
