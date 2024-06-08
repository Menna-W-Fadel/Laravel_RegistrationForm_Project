<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class email_format_test extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_that_email_format_is_correct(): void
    {
        $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

        $email = "aly@gmail.com";

        $this->assertMatchesRegularExpression($pattern, $email);
    }
}
