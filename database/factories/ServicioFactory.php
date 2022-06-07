<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Servicio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServicioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);
        $categoria = Categoria::all()->random();
        $cost = $this->faker->randomDigitNotNull();

        return [
            'name' => $name,
            'description' => $this->faker->sentence(3),
            'slug' => Str::slug($name),
            'cost' => $cost,
           'comissionfordoing' => 3,
           'comissionforsale' =>  2,
            'price' => $cost + 7,
            'status' => Servicio::Activo,
            'categoria_id' => $categoria,
        ];
    }
}
