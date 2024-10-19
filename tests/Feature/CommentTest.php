<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_create_a_comment(){
        $user = User::factory()->create();
        $post = Post::factory()->create();
        $this->actingAs($user);

        $commentData = [
            'comment' => 'This is a test comment.',
        ];

        $response = $this->post('/posts/' . $post->id . '/comments', $commentData);
        $response->assertRedirect('/posts/' . $post->id);

        $this->assertDatabaseHas('comments', [
            'comment' => 'This is a test comment.',
            'user_id' => $user->id,
            'post_id' => $post->id,
        ]);
    }

    public function test_comments_can_be_viewed_with_post() {
        $post = Post::factory()->create();
        $comments = Comment::factory()->count(3)->create(['post_id' => $post->id]);

        $response = $this->get('/posts/' . $post->id);
        $response->assertStatus(200);

        foreach ($comments as $comment) {
            $response->assertSee($comment->comment);
        }
    }

    public function test_comment_owner_can_delete_their_comment(){
        $user = User::factory()->create();
        $post = Post::factory()->create();
        $comment = Comment::factory()->create(['user_id' => $user->id, 'post_id' => $post->id]);
        $this->actingAs($user);

        $response = $this->delete('/comments/' . $comment->id);

        $this->assertDatabaseMissing('comments', [
            'id' => $comment->id,
        ]);
        $response->assertRedirect('/posts/' . $post->id);
    }

    public function test_guest_user_can_create_a_comment(){
        $post = Post::factory()->create();

        $commentData = [
            'comment' => 'This is a guest comment.',
        ];
        $response = $this->post('/posts/' . $post->id . '/comments', $commentData);

        $this->assertDatabaseHas('comments', [
            'comment' => 'This is a guest comment.',
            'user_id' => null,  // Assuming null for guest users
            'post_id' => $post->id,
        ]);
        $response->assertRedirect('/posts/' . $post->id);
    }
}
