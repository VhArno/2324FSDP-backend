<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class QuestionTest extends TestCase
{
    use RefreshDatabase;

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
        $role = Role::factory()->create(['role_name' => 'admin']);

        $user = User::factory()->create();
        $user->role()->associate($role);
        $user->save();
        
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
            ->assertStatus(401)
            ->assertJson([
                'message' => 'Unauthenticated.',
            ]);
    }

    /**
     * Test the patch route of questions
     */
    public function test_patch_question(): void {
        $role = Role::factory()->create(['role_name' => 'admin']);

        $user = User::factory()->create();
        $user->role()->associate($role);
        $user->save();

        $question = Question::factory()->create();
        
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->patchJson('/api/admin/questions/', [
                'question_id' => $question->id,
                'question' => 'Hoe gaat het vandaag?',
            ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Question has been updated',
            ]);
    }

    /**
     * Test the patch route of questions as user
     */
    public function test_patch_question_as_user(): void {
        $question = Question::factory()->create();
        
        $response = $this->patchJson('/api/admin/questions/', [
                'question_id' => $question->id,
                'question' => 'Hoe gaat het vandaag?',
            ]);

        $response
            ->assertStatus(401)
            ->assertJson([
                'message' => 'Unauthenticated.',
            ]);
    }

    /**
        * Test the delete route of questions 
    */
    public function test_delete_question(): void {
        $role = Role::factory()->create(['role_name' => 'admin']);
        
        $user = User::factory()->create();
        $user->role()->associate($role);
        $user->save();

        $question = Question::factory()->create();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->deleteJson('/api/admin/questions/' . $question->id);

        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Question has been deleted',
            ]);
    }

    /**
        * Test the delete route of questions with invalid id
    */
    public function test_invalid_delete_question(): void {
        $role = Role::factory()->create(['role_name' => 'admin']);
        
        $user = User::factory()->create();
        $user->role()->associate($role);
        $user->save();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->deleteJson('/api/admin/questions/200');

        $response
            ->assertStatus(404);
    }
}
