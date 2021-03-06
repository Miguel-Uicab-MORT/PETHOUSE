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
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        //$this->call(CategoriaSeeder::class);
        //$this->call(ProductoSeeder::class);
        //$this->call(ServicioSeeder::class);
        //$this->call(ClienteSeeder::class);
        //$this->call(CitaSeeder::class);
    }
}
