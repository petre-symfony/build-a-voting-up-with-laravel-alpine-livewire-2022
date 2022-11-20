<?php

namespace Tests\Feature\Comments;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class addCommentsTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function add_comment_livewire_component_renders() {
        $idea = Idea::factory()->create();

        $response = $this->get(route('idea.show', $idea));
        $response->assertSeeLivewire('add-comment');
    }

    /** @test */
    public function add_comment_form_renders_when_user_is_logged_in() {
        $user = User::factory()->create();
        $idea = Idea::factory()->create();

        $response = $this->actingAs($user)->get(route('idea.show', $idea));
        $response->assertSee("share your thoughts...");
    }

    /** @test */
    public function add_comment_form_does_not_render_when_user_is_logged_out() {
        $idea = Idea::factory()->create();

        $response = $this->get(route('idea.show', $idea));
        $response->assertSee('Please login or create an account to post a comment');
    }
}
