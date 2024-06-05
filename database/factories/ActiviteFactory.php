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
            'title' => $this->faker->name(1,true),
            'description'=> $this->faker->sentence,
            'lieu'=> $this->faker->address,
            'image'=> $this->faker->url,
            'status'=> $this->faker->boolean,
            'categorie_id'=> $this->faker->randomDigit,
            'user_id'=> $this->faker->randomDigit,
            'date_debut'=> $this->faker->date,
            'date_fin'=> $this->faker->date
        ];
    }
}
