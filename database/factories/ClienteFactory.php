<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();
        return [
            'name' => $name,
            'businessname' => $name,
            'lastname' => $this->faker->lastName(),
            'number' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'rfc' => $this->faker->ean8(),
            'state' => $this->faker->state(),
            'city' => $this->faker->city(),
            'colony' => $this->faker->citySuffix(),
            'address' => $this->faker->address(),
            'cp' => $this->faker->postcode(),
        ];
    }
}
