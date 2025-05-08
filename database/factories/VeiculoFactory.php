<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Veiculo>
 */
class VeiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'veiculo' => $this->faker->word(),
            'marca' => $this->faker->company(),
            'ano' => $this->faker->numberBetween(1990, 2024),
            'descricao' => $this->faker->sentence(),
            'vendido' => $this->faker->boolean(),
        ];
    }
}
