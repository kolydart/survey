<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\SurveysController
 */
class SurveysControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function clone_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $survey = factory(\App\Survey::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get(route('admin.surveys.clone', [$survey]));

        $response->assertRedirect(route('admin.surveys.show', $newSurvey));

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function create_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get(route('admin.surveys.create'));

        $response->assertOk();
        $response->assertViewIs('admin.surveys.create');
        $response->assertViewHas('institutions');
        $response->assertViewHas('categories');
        $response->assertViewHas('groups');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function destroy_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $survey = factory(\App\Survey::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->delete(route('admin.surveys.destroy', [$survey]));

        $response->assertRedirect(route('admin.surveys.index'));
        $this->assertDeleted($admin);

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function edit_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $survey = factory(\App\Survey::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get(route('admin.surveys.edit', [$survey]));

        $response->assertOk();
        $response->assertViewIs('admin.surveys.edit');
        $response->assertViewHas('survey');
        $response->assertViewHas('institutions');
        $response->assertViewHas('categories');
        $response->assertViewHas('groups');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function index_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get(route('admin.surveys.index'));

        $response->assertOk();
        $response->assertViewIs('admin.surveys.index');
        $response->assertViewHas('surveys');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function mass_destroy_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->post(route('admin.surveys.mass_destroy'), [
            // TODO: send request data
        ]);

        $response->assertOk();

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function perma_del_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $survey = factory(\App\Survey::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->delete(route('admin.surveys.perma_del', ['id' => $survey->id]));

        $response->assertRedirect(route('admin.surveys.index'));

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function restore_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $survey = factory(\App\Survey::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->post(route('admin.surveys.restore', ['id' => $survey->id]), [
            // TODO: send request data
        ]);

        $response->assertRedirect(route('admin.surveys.index'));

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function show_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $survey = factory(\App\Survey::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get(route('admin.surveys.show', [$survey]));

        $response->assertOk();
        $response->assertViewIs('admin.surveys.show');
        $response->assertViewHas('survey');
        $response->assertViewHas('questionnaires');
        $response->assertViewHas('items');
        $response->assertViewHas('duplicates');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function store_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->post(route('admin.surveys.store'), [
            // TODO: send request data
        ]);

        $response->assertRedirect(route('admin.surveys.index'));

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function update_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $survey = factory(\App\Survey::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->put(route('admin.surveys.update', [$survey]), [
            // TODO: send request data
        ]);

        $response->assertRedirect(route('admin.surveys.show', $id));

        // TODO: perform additional assertions
    }

    // test cases...
}
