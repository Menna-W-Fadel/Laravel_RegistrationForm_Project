<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class validation_test extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $data = [
            "username" => "Ahmed",
            "fullname" => "ahmed mohamed",
            "email" => "ahmed@gmail.com",
            "phone" => "01208700820",
            "address" => "zayed",
            "birthday" => "2003-06-28",
            "password" => "ahmed1234%",
            "password-confirmation" => "ahmed1234%",
            "image" => "kawkab.jpg"
        ];
        $response = $this->post('/user', $data);
        $response->assertValid();

        $invalid_data = [
            "username" => "Aly",
            "fullname" => "ahmed mohamed",
            "email" => "ahmed@gmail",
            "phone" => "01208700820",
            "address" => "zayed",
            // "birthday" => "2003-06-28",
            "password" => "aly1234",
            "password-confirmation" => "aly12345",
            "image" => "img1"
        ];
        $response2 = $this->post('/user', $invalid_data);
        $response2->assertInvalid();

    }
}
