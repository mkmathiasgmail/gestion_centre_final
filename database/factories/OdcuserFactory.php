<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Odcuser>
 */
class OdcuserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->safeEmail,
            'password' => $this->faker->password,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'birthdate' => $this->faker->date,
            'phone' => $this->faker->phoneNumber,
            'linkedin' => $this->faker->url,
            'profession' => $this->faker->jobTitle,
            'company' => $this->faker->company,
            'university' => $this->faker->word,
            'speciality' => $this->faker->jobTitle,
            'country'=> $this->faker->country,
            'cv' => $this->faker->filePath,
            'photo' => $this->faker->filePath,
        ];

    }
}
