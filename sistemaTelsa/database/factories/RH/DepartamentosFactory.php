<?php

namespace Database\Factories\RH;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RH\Areas;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RH\Departamentos>
 */
class DepartamentosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
            'name' => $this->faker->sentence(),
            'area_id' => Areas::all()->random()->id,
        ];
    }
}
