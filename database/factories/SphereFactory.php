<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sphere;
use App\Models\User;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sphere>
 */
class SphereFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => Str::ulid(), // Explicit ULID generation
            'name' => fake()->word(),
            'description' => fake()->sentence(),
            'type' => fake()->randomElement(['public', 'private']),
            'user_id' => User::factory(),
        ];
    }
}
