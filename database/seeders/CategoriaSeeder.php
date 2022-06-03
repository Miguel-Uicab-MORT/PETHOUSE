<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'name' => 'Ferreteria',
            'status' => Categoria::Activo,
        ]);

        Categoria::create([
            'name' => 'Papeleria',
            'status' => Categoria::Activo,
        ]);
    }
}
