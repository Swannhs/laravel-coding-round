<?php

namespace Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_register_a_user()
    {
        $data = [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => 'password123',
        ];

        $response = $this->postJson('/api/register', $data);

        $response->assertStatus(201)
            ->assertJson([
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
            ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
        ]);

        $user = User::first();
        $this->assertTrue(Hash::check('password123', $user->password));
    }

    /** @test */
    public function it_requires_name_email_and_password_for_registration()
    {
        $response = $this->postJson('/api/register', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'email', 'password']);
    }
}
