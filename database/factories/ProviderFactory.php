<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provider>
 */
class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'type' => $this->faker->randomElement(['hospital', 'clinic', 'pharmacy']),
            'specializations' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'website' => $this->faker->url,
            'email' => $this->faker->safeEmail,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'is_insurance_accepted' => $this->faker->boolean,
            'image' => $this->faker->imageUrl(640, 480, 'hospital', true, 'Faker'),
        ];
    }
}
