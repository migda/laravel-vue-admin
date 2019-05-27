<?php

namespace Tests\Feature\Admin\Api\V1;

use App\Models\Country;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class CountriesTest extends AbstractApiTestCase
{
    use DatabaseTransactions;

    /**
     *
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->endpoint = 'countries';
    }

    /**
     * A basic test for store method for countries
     *
     * @return void
     */
    public function testStoreMethod()
    {
        // Mock up
        $country = factory(Country::class)->make()->toArray();

        // Tests
        $this->postJson($this->apiUrl . $this->endpoint, $country)
            ->assertStatus(200);
        $this->assertDatabaseHas('countries', $country);
    }

    /**
     * A basic test for update method for countries
     *
     * @return void
     */
    public function testUpdateMethod()
    {
        // Mock up
        $country = factory(Country::class)->create();
        $new_country = factory(Country::class)->make()->toArray();

        // Tests
        $this->patchJson($this->apiUrl . $this->endpoint . '/' . $country->id, $new_country)
            ->assertStatus(200);
        $this->assertDatabaseHas('countries', [
            'id' => $country->id,
            'name' => $new_country['name']
        ]);
    }
}
