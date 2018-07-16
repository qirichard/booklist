<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class BookTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testEdit()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->json('POST', '/book', [
                                                                    'title' => 'Test',
                                                                    'isbn' => '123',
                                                                    'author' => 'A1',
                                                                    'price' => '9.99',
                                                                    'genres' => ['Health'],
                                                                    'description' => 'This is a test'
                                                ]);

        $response->assertRedirect('/admin');
    }
}
