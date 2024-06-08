<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class password_confirmation_test extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_that_password_and_confirm_passowrd_are_equal(): void
    {
        $right_password = "aly1234%";
        $confirm_password1 = "aly1234%";

        $this->assertEquals($right_password, $confirm_password1);

        $wrong_password = "aly1234%";
        $confirm_password2 = "aly12345345%";

        $this->assertNotEquals($wrong_password, $confirm_password2);


    }
}
