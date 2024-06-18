<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employabilite>
 */
class EmployabiliteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'type_contrat' => $this->faker->sentence,
            'genre_contrat' => $this->faker->sentence,
            'nomboite' => $this->faker->jobTitle,
            'periode' => $this->faker->date,
        ];
    }
}
