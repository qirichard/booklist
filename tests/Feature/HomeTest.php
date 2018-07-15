<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testBasicTest()
    // {
    //     $response = $this->get('/');
    //
    //     $response->assertStatus(200);
    // }

    public function testBooklist()
    {
        $this->visit('/')->see('2nd Treasures')->see('Creating poetry');
    }
}
