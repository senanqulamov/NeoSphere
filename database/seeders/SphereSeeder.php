<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sphere;

class SphereSeeder extends Seeder
{
    public function run(): void
    {
        Sphere::factory()->count(15)->create(); // Create 10 spheres
    }
}
