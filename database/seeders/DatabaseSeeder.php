<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use App\Models\Sphere;
use App\Models\CoreHub;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 CoreHubs first
        $coreHubs = CoreHub::factory()->count(10)->create();

        // Create users with spheres linked to existing core hubs
        User::factory()
            ->count(50)
            ->has(
                Sphere::factory()
                    ->count(3)
                    ->state(fn() => ['core_hub_id' => $coreHubs->random()->id])
            )
            ->create();
    }
}
