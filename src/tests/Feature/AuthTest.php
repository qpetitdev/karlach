<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Laravel\Passport\Passport;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_should_allow_authenticated_access(): void
    {
        $user = User::factory()->make();
        Passport::actingAs($user);

        $response = $this->withHeader("Accept", "application/json")
            ->get("/api/v1.0/test");
        $response->assertStatus(200);
    }

    public function test_the_application_should_refuse_unauthenticated_access()
    {
        $this->withHeader("Accept", "application/json")
            ->get('/api/v1.0/test')
            ->assertStatus(401);
    }
}
