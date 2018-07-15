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
                                                                    'ISBN' => '123',
                                                                    'Author' => 'A1',
                                                                    'Price' => '9.99',
                                                                    'Genres' => 'Health',
                                                                    'Description' => 'This is a test'
                                                ]);

        $response->assertRedirect('/admin');
    }
}
