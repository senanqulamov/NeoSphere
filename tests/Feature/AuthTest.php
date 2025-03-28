<?php

use App\Models\User;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_user_registration(): void {
        $response = $this->postJson('/api/register', [
            'name' => 'Test User',
            'email' => 'test@neosphere.com',
            'password' => 'password',
        ]);

        $response->assertStatus(201) // Ensure the route exists and returns 201
            ->assertJsonStructure(['token']);
    }

    public function test_protected_route_access(): void {

        /** @var User $user */
        $user = User::factory()->createOne();
        $response = $this->actingAs($user)
            ->getJson('/api/profile'); // Ensure this route exists and is protected

        $response->assertStatus(200)
            ->assertJson(['email' => $user->email]);
    }
}
