<?php

namespace Database\Seeders;

use App\Models\Cita;
use Illuminate\Database\Seeder;

class CitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cita::factory(10)->create();
    }
}
