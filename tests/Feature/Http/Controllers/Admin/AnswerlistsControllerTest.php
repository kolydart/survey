<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\AnswerlistsController
 */
class AnswerlistsControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function create_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get(route('admin.answerlists.create'));

        $response->assertOk();
        $response->assertViewIs('admin.answerlists.create');
        $response->assertViewHas('answers');
        $response->assertViewHas('hidden_answer');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function destroy_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $answerlist = factory(\App\Answerlist::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->delete(route('admin.answerlists.destroy', [$answerlist]));

        $response->assertRedirect(route('admin.answerlists.index'));
        $this->assertDeleted($admin);

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function edit_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $answerlist = factory(\App\Answerlist::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get(route('admin.answerlists.edit', [$answerlist]));

        $response->assertOk();
        $response->assertViewIs('admin.answerlists.edit');
        $response->assertViewHas('answerlist');
        $response->assertViewHas('answers');
        $response->assertViewHas('hidden_answer');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function index_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get(route('admin.answerlists.index'));

        $response->assertOk();
        $response->assertViewIs('admin.answerlists.index');
        $response->assertViewHas('answerlists');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function mass_destroy_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->post(route('admin.answerlists.mass_destroy'), [
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

        $answerlist = factory(\App\Answerlist::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->delete(route('admin.answerlists.perma_del', ['id' => $answerlist->id]));

        $response->assertRedirect(route('admin.answerlists.index'));

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function restore_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $answerlist = factory(\App\Answerlist::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->post(route('admin.answerlists.restore', ['id' => $answerlist->id]), [
            // TODO: send request data
        ]);

        $response->assertRedirect(route('admin.answerlists.index'));

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function show_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $answerlist = factory(\App\Answerlist::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get(route('admin.answerlists.show', [$answerlist]));

        $response->assertOk();
        $response->assertViewIs('admin.answerlists.show');
        $response->assertViewHas('answerlist');
        $response->assertViewHas('questions');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function store_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->post(route('admin.answerlists.store'), [
            // TODO: send request data
        ]);

        $response->assertRedirect(route('admin.answerlists.index'));

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function update_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $answerlist = factory(\App\Answerlist::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->put(route('admin.answerlists.update', [$answerlist]), [
            // TODO: send request data
        ]);

        $response->assertRedirect(route('admin.answerlists.index'));

        // TODO: perform additional assertions
    }

    // test cases...
}
