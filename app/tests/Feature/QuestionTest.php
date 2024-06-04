<?php

namespace Tests\Feature;

use App\Models\Role;
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
        $role = Role::factory()->create();
        $role->id = 5;
        $role->role_name = 'admin';

        $user->role = $role;
        
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->postJson('/api/admin/questions', ['question' => 'Hoe gaat het vandaag?']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => 'Question has been added',
            ]);
    }

    /**
     * Test the post route of questions as an user
     */
    public function test_post_question_as_user(): void {
        $response = $this->postJson('/api/admin/questions', ['question' => 'Hoe gaat het vandaag?']);

        $response
            ->assertStatus(422)
            ->assertJson([
                'message' => 'error adding question',
            ]);
    }

    /**
     * Test the patch route of questions
     */
    public function test_patch_question(): void {
        $response = $this->patchJson('/api/admin/questions', ['question_id' => 1,'question' => 'Hoe gaat het vandaag?']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Question has been updated',
            ]);
    }

    /**
        * Test the delete route of questions 
    */
    public function test_delete_question(): void {
        $user = User::factory()->create();
        $role = Role::factory()->create();
        $role->id = 5;
        $role->role_name = 'admin';

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->postJson('/api/admin/questions/10');

        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => 'Question has been deleted',
            ]);
    }

    /**
        * Test the delete route of questions with invalid id
    */
    public function test_invalid_delete_question(): void {
        $response = $this->deleteJson('/api/admin/questions/100');

        $response
            ->assertStatus(422)
            ->assertJson([
                'message' => 'Question has been deleted',
            ]);
    }
}
