<?php

namespace Tests\Unit\Admin\Api\V1;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class UsersTest extends AbstractApiTestCase
{
    use DatabaseTransactions;

    /**
     *
     */
    public function setUp()
    {
        parent::setUp();
        $this->endpoint = 'users';
    }

    /**
     * A basic test for store method for users
     *
     * @return void
     */
    public function testStoreMethod()
    {
        // Mock up
        $user = factory(User::class)->make()->toArray();
        $role_id = $user['role'];
        $postData = $user;
        $postData['role'] = [
            'id' => $role_id
        ];
        $postData['country'] = [
            'id' => $user['country_id']
        ];

        // Tests
        $this->postJson($this->apiUrl . $this->endpoint, $postData)
            ->assertStatus(200);
        $this->assertDatabaseHas($this->endpoint, $user);
    }

    /**
     * A basic test for update method for users
     *
     * @return void
     */
    public function testUpdateMethod()
    {
        // Mock up
        $user = factory(User::class)->create();
        $new_user = factory(User::class)->make()->toArray();

        $role_id = $new_user['role'];
        $patchData = $new_user;
        $patchData['role'] = [
            'id' => $role_id
        ];
        $patchData['country'] = [
            'id' => $new_user['country_id']
        ];

        // Tests
        $this->patchJson($this->apiUrl . $this->endpoint . '/' . $user->id, $patchData)
            ->assertStatus(200);
        $this->assertDatabaseHas($this->endpoint, [
            'id' => $user->id,
            'name' => $new_user['name']
        ]);
    }
}
