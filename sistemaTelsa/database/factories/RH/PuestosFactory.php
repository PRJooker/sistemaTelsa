<?php

namespace Database\Factories\RH;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RH\Departamentos;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RH\Puestos>
 */
class PuestosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->jobTitle(),
            'descripcion_puesto' => $this->faker->sentence(),
            'num_plazas' => $this->faker->numberBetween(1, 10),
            'salario_puesto' => $this->faker->numberBetween(30000, 100000),
            'departamento_id' => Departamentos::all()->random()->id,
        ];
    }
}
