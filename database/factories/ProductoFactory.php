<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $barcode = $this->faker->ean8();
        $name = $this->faker->sentence(2);
        $stock = $this->faker->randomDigitNotNull();
        $categoria = Categoria::all()->random();
        $cost = $this->faker->randomDigitNotNull();

        return [
            'barcode' => $barcode,
            'name' => $name,
            'description' => $this->faker->sentence(3),
            'slug' => Str::slug($name),
            'stock' => $stock,
            'cost' => $cost,
            'price' => $cost + 2,
            'status' => Producto::Activo,
            'categoria_id' => $categoria,
        ];
    }
}
