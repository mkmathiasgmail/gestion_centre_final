<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidat>
 */
class CandidatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'activite_id' => $this->faker->numberBetween(1, 10),
            'odcuser_id' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->boolean
        ];

    }
}
