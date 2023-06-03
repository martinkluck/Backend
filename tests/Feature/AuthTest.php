<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    public function test_register_returns_a_successful_response(): void
    {
        $response = $this->postJson('/api/register', ['name' => 'John Doe', 'email' => 'test@test.com', 'password' => 'password']);

        $response->assertStatus(200);
    }
    public function test_register_validation_fails(): void
    {
        $response = $this->postJson('/api/register', []);

        $response->assertStatus(400);
    }
    public function test_login_returns_a_successful_response(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/api/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $response->assertStatus(200);
        $this->assertAuthenticatedAs($user);
    }
    public function test_login_validation_fails(): void
    {
        $response = $this->postJson('/api/login', [
            'email' => 'otro@example.com',
            'password' => 'otroPassword',
        ]);

        $response->assertStatus(401);
    }
    public function test_logout_returns_a_successful_response(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);
        $token = $user->createToken('test-token')->plainTextToken;

        $response = $this->actingAs($user)
            ->get('/api/logout', ['Authorization' => 'Bearer ' . $token]);

        $response->assertStatus(204);
    }
}
