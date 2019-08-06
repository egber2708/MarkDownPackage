<?php

namespace egber\Press\Test;
use egber\Press\Test\TestCase;
use egber\Press\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PressModelTest extends TestCase{

    use RefreshDatabase;
    /** @test */
    public function test_post_create_1()
    {
        $this->withExceptionHandling();
        factory(Post::class)->create();
        $post = Post::all();
        $this->assertCount(1, $post);
    }
    
}
