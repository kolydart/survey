<?php

namespace Tests\Unit\Http\Requests\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @see \App\Http\Requests\Admin\StoreResponsesRequest
 */
class StoreResponsesRequestTest extends TestCase
{
    /** @var \App\Http\Requests\Admin\StoreResponsesRequest */
    private $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new \App\Http\Requests\Admin\StoreResponsesRequest();
    }

    /**
     * @test
     */
    public function authorize()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $actual = $this->subject->authorize();

        $this->assertTrue($actual);
    }

    /**
     * @test
     */
    public function rules()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $actual = $this->subject->rules();

        $this->assertValidationRules([
            'questionnaire_id' => 'required',
            'question_id' => 'required',
            'answer_id' => 'required',
        ], $actual);
    }

    // test cases...
}
