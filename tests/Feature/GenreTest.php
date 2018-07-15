<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GenreTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAdd()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->json('POST', '/genre', ['name' => 'Test']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }

    public function testDelete()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->json('DELETE', '/genre/test', []);

        $response
            ->assertStatus(200)
            ->assertJson([
                'deleted' => true,
            ]);
    }
}
