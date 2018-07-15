<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GenreTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAdd()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/genre', ['name' => 'Test']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }

    public function testDelete()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('DELETE', '/genre/test', []);

        $response
            ->assertStatus(201)
            ->assertJson([
                'deleted' => true,
            ]);
    }
}
