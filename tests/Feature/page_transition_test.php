<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class page_transition_test extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_that_the_correct_page_is_visited_successfully(): void
    {
        $response = $this->get('/');


        $response->assertStatus(200);
        $response -> assertViewIs("signUp");
    }
}
