<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    public function test_authenticated_user_can_create_a_post(){
        $user = User::factory()->create();

        $this->actingAs($user);

        $postData = [
            'title' => 'Test Post Title',
            'content' => 'Test Post Content',
        ];

        $response = $this->post('/posts', $postData);
        $response->assertRedirect();

        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post Title',
            'content' => 'Test Post Content',
            'user_id' => $user->id,
        ]);
    }

    public function test_a_post_can_be_viewed_by_anyone() {
        $post = Post::factory()->create();
        
        $response = $this->get('/posts/' . $post->id);
        $response->assertStatus(200);

        $response->assertSee($post->title);
        $response->assertSee($post->content);
    }

    public function test_post_owner_can_update_their_post(){
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $updatedData = [
            'title' => 'Updated Title',
            'content' => 'Updated Content',
        ];

        $response = $this->post('/posts/' . $post->id, $updatedData);
        $response->assertRedirect();

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Updated Title',
            'content' => 'Updated Content',
        ]);
    }

    public function test_post_owner_can_delete_their_post(){
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $response = $this->delete('/posts/' . $post->id);
        $response->assertRedirect('/posts');

        $this->assertDatabaseMissing('posts', [
            'id' => $post->id,
        ]);
    }
}
