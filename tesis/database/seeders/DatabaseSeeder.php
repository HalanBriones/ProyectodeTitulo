<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PerfilSeeder::class,
            UserSeeder::class,
            MarcaSeeder::class,
            TipoProductoSeeder::class,
            ConocimientoServicioSeeder::class,
            TipoComercializacionServicioSeeder::class
        ]);
    }
}