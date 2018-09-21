<?php

namespace Tests\Unit\Admin\Api\V1;

use App\Models\Country;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AbstractApiTestCase extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var
     */
    protected $apiUrl;
    /**
     * @var
     */
    protected $admin;
    /**
     * @var
     */
    protected $endpoint;

    /**
     * Set up basic data
     */
    public function setUp()
    {
        parent::setUp();
        $this->apiUrl = config('app.url') . '/api/admin/v1/';
        $this->admin = factory(User::class)->create([
            'role_id' => User::ROLE_ADMIN
        ]);
        $this->actingAs($this->admin);
    }
}
