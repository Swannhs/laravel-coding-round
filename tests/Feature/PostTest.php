<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_post()
    {
        $data = [
            'title' => 'My First Post',
            'content' => 'This is the content of my first post.',
        ];

        $response = $this->postJson('/api/posts', $data);

        $response->assertStatus(201)
            ->assertJson([
                'title' => 'My First Post',
                'content' => 'This is the content of my first post.',
            ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'My First Post',
        ]);
    }

    /** @test */
    public function it_can_list_all_posts()
    {
        $post = Post::factory()->create();

        $response = $this->getJson('/api/posts');

        $response->assertStatus(200)
            ->assertJsonFragment([
                'title' => $post->title,
            ]);
    }

    /** @test */
    public function it_can_view_a_single_post()
    {
        $post = Post::factory()->create();

        $response = $this->getJson('/api/posts/'.$post->id);

        $response->assertStatus(200)
            ->assertJson([
                'title' => $post->title,
                'content' => $post->content,
            ]);
    }
}
