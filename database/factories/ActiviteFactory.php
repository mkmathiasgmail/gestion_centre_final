<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activite>
 */
class ActiviteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'description'=> $this->faker->sentence(1000,false),
            'lieu'=> $this->faker->city,
            'image'=> $this->faker->url,
            'status'=> $this->faker->boolean,
            'date_debut'=> $this->faker->date('Y-m-d','now'),
            'date_fin'=> $this->faker->date('Y-m-d','now')
        ];
    }
}
