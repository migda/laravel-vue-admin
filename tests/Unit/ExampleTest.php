<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    /**
     * A basic test db example
     */
    public function testDbConnection()
    {
        // Create sample User
        $user = factory(User::class)->create();
        // Tests
        $this->assertDatabaseHas('users', ['email' => $user->email]);
    }
}
