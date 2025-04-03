<?php

namespace Database\Factories;

use App\Models\CoreHub;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CoreHub>
 */

class CoreHubFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => Str::ulid(), // Explicit ULID generation
            'name' => fake()->company(),
            'description' => fake()->paragraph(),
        ];
    }
}
