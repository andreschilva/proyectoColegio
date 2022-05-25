<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombres' => $this -> faker->name(),
            'primer_apellido' => $this -> faker->lastName(),
            'segundo_apellido' => $this -> faker->lastName(),
            'genero' => $this -> faker->randomElement(['M', 'F']),
            'ci' => $this -> faker->numberBetween(100000, 99999999),
            'ci_exp' => $this -> faker->randomElement(['SC', 'CH','LP', 'CB','OR', 'PT','TJ']),
            'fecha_nacimiento' =>  $this -> faker->date(),
            'celular' => $this -> faker->phoneNumber(),
            'telefono' => $this -> faker->phoneNumber(),
            'direccion' => $this -> faker->address(),
            'correo' => Null,
            'activo' => 1,
            'eliminado' => 0
        ];
    }
}
