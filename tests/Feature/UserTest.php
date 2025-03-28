<?php

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_user_has_spheres(): void {
        // Ensure database is migrated and relationships are properly set up
        $this->artisan('migrate');

        $user = User::factory()->hasSpheres(3)->create();
        $this->assertCount(3, $user->spheres);
    }

    public function test_karma_points_update(): void {
        // Ensure database is migrated and fresh state is used
        $this->artisan('migrate');

        $user = User::factory()->create(['karma_points' => 0]);
        $user->karmaLogs()->create(['points' => 50, 'reason' => 'test']);
        $this->assertEquals(50, $user->fresh()->karma_points);
    }
}
