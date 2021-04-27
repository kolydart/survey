<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\ActivitylogsController
 */
class ActivitylogsControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function destroy_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $activitylog = factory(\App\Activitylog::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->delete(route('admin.activitylogs.destroy', [$activitylog]));

        $response->assertRedirect(route('admin.activitylogs.index'));
        $this->assertDeleted($admin);

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function edit_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $activitylog = factory(\App\Activitylog::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get(route('admin.activitylogs.edit', [$activitylog]));

        $response->assertOk();
        $response->assertViewIs('admin.activitylogs.edit');
        $response->assertViewHas('activitylog');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function index_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get(route('admin.activitylogs.index'));

        $response->assertOk();
        $response->assertViewIs($template);
        $response->assertViewHas('row');
        $response->assertViewHas('gateKey');
        $response->assertViewHas('routeKey');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function mass_destroy_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->post(route('admin.activitylogs.mass_destroy'), [
            // TODO: send request data
        ]);

        $response->assertOk();

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function show_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $activitylog = factory(\App\Activitylog::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get(route('admin.activitylogs.show', [$activitylog]));

        $response->assertOk();
        $response->assertViewIs('admin.activitylogs.show');
        $response->assertViewHas('activitylog');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function update_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $activitylog = factory(\App\Activitylog::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->put(route('admin.activitylogs.update', [$activitylog]), [
            // TODO: send request data
        ]);

        $response->assertRedirect(route('admin.activitylogs.index'));

        // TODO: perform additional assertions
    }

    // test cases...
}
