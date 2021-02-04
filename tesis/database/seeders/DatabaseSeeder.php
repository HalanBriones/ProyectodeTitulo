<?php

namespace Database\Seeders;

use App\Models\ComercializacionProducto;
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
            RolSeeder::class,
            UserSeeder::class,
            MarcaSeeder::class,
            ConocimientoServicioSeeder::class,
            ComercializacionServicioSeeder::class,
            EstadoSeeder::class,
            ComercializacionProducto::class
        ]);
    }
}
