<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => 'test',
            'last_name' => 'customer',
            'email' => "test@gmail.com",
            'uuid' => "jiajsoadiaspahda",
            'address' => "test address",
            'phone' => "01201478220",
            'nid' => "123456789542585",
            'active' => true,
            'password' => '$2y$12$Vs/TH.i74LnJaepIAE7JjeYBT6zOHjZfJqVPXDvC3rH.ghwOdpZOW',
        ];
    }
}
