<?php

namespace Tests\Feature;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class database_insertion_test extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test function that creates a user and adds it to the DB and check whether it is added.
     */
    public function test_that_a_user_can_be_added_to_the_database_successfully(): string
    {

        $user = User::create([
            "username" => "Aly",
            "fullname" => "aly walaa eldeen",
            "email" => "aly@gmail.com",
            "phone" => "01208700820",
            "address" => "october",
            "birtdate" => "2003-06-28 00:00:00",
            "password" => "aly1234%",
            "image_name" => "img1"
        ]);
        $user->save();



        if (
            $this->assertDatabaseHas(
                "users",
                [
                    "username" => "Aly",
                    "fullname" => "aly walaa eldeen",
                    "email" => "aly@gmail.com",
                    "phone" => "01208700820",
                    "address" => "october",
                    "birtdate" => "2003-06-28 00:00:00",
                ]
            )
        ) {
            return "Insertion perfomed successfully";
        } else {
            return "Error performing insertions";
        }



    }
}
