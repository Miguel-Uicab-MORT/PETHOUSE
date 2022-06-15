<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Servicio;
use Illuminate\Database\Eloquent\Factories\Factory;

class CitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $servicio = Servicio::all()->random();
        $cliente = Cliente::all()->random();

        return [
            'scheduled_at' => $this->faker->date($format = 'Y-m-d', $min = 'now'),
            'time' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'cliente_id' => $cliente,
            'servicio_id' => $servicio
        ];
    }
}
