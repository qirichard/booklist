<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function testLogin()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function testEdit()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->json('PUT', '/user', ['id' => 1, 'name' => 'Richard', 'email' => 'qi.richard@gmail.com', 'role' => 'admin']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'updated' => true,
            ]);
    }
}
