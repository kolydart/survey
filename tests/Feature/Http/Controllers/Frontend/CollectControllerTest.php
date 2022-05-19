<?php

namespace Tests\Feature\Http\Controllers\Frontend;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Frontend\CollectController
 */
class CollectControllerTest extends TestCase
{
    /**
     * @test
     */
    public function create_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $response = $this->get(route('frontend.create', ['alias' => $alias]));

        $response->assertOk();
        $response->assertViewIs('frontend.home');
        $response->assertViewHas('content');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function index_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $response = $this->get(route('frontend.home'));

        $response->assertRedirect(route('admin.home'));

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function store_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $response = $this->post(route('frontend.store'), [
            // TODO: send request data
        ]);

        $response->assertOk();
        $response->assertViewIs('frontend.home');
        $response->assertViewHas('content');

        // TODO: perform additional assertions
    }

    // test cases...
}
