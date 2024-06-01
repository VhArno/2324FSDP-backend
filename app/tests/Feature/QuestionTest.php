<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class QuestionTest extends TestCase
{
    /**
     * Test the get route of questions
     */
    public function test_get_questions(): void {
        $response = $this->get('/api/questions');

        $response->assertStatus(200);
    }


    /**
     * Test the post route of questions as an admin
     */
    public function test_post_question_as_admin(): void {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->postJson('/api/admin/questions', ['question' => 'Hoe gaat het vandaag?']);

        $response
            ->assertStatus(401)
            ->assertJson([
                'message' => 'Unauthorized',
            ]);
    }

    /**
     * Test the post route of questions as an user
     */
    public function test_post_question_as_user(): void {
        $response = $this->postJson('/api/admin/questions', ['question' => 'Hoe gaat het vandaag?']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => 'Question has been added',
            ]);
    }

    /**
     * Test the post route of questions as an user
     */
    public function test_patch_questions(): void {
        $response = $this->postJson('/api/admin/questions', ['question' => 'Hoe gaat het vandaag?']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => 'Question has been added',
            ]);
    }
}
