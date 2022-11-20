<?php

namespace Tests\Feature\Comments;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class showCommentsTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function idea_comments_livewire_component_renders() {
        $idea = Idea::factory()->create();

        $commentOne = Comment::factory()->create([
            'idea_id' => $idea->id,
            'body' => 'This is my first comment'
        ]);

        $this->get(route('idea.show', $idea))
            ->assertSeeLivewire('idea-comments');
    }

    /** @test */
    public function idea_comment_livewire_component_renders() {
        $idea = Idea::factory()->create();

        $commentOne = Comment::factory()->create([
            'idea_id' => $idea->id,
            'body' => 'This is my first comment'
        ]);

        $this->get(route('idea.show', $idea))
            ->assertSeeLivewire('idea-comment');
    }

    /** @test */
    public function no_comments_shows_appropriate_message() {
        $idea = Idea::factory()->create();

        $this->get(route('idea.show', $idea))
            ->assertSee('No comments yet...');
    }
}
