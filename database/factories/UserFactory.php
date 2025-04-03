<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::ulid(),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'title' => fake()->jobTitle(),
            'karma_points' => fake()->numberBetween(0, 1000),
            'karma_quants' => fake()->numberBetween(0, 500),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */

    // public function unverified(): static
    // {
    //     return $this->state(fn(array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }
}
