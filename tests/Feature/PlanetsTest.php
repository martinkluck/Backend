<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class PlanetsTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
    public function test_get_all_planets_returns_a_successful_response(): void
    {
        Http::fake([
            'swapi.dev/*' => Http::response(['results' => []]),
        ]);

        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);
        $token = $user->createToken('test-token')->plainTextToken;

        $response = $this->actingAs($user)
            ->get('/api/planets', ['Authorization' => 'Bearer ' . $token]);

        $response->assertStatus(200);
    }
    public function test_get_planets_by_id_returns_a_successful_response(): void
    {
        Http::fake([
            'swapi.dev/*' => Http::response(),
        ]);

        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);
        $token = $user->createToken('test-token')->plainTextToken;

        $response = $this->actingAs($user)
            ->get('/api/planets/1', ['Authorization' => 'Bearer ' . $token]);

        $response->assertStatus(200);
    }
}
