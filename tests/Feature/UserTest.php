<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $this->visit('/admin')
             ->click('Register')
             ->seePageIs('/register');
    }

    public function testLogin()
    {
        $this->visit('/admin')
             ->seePageIs('/login');
    }
}