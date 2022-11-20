<?php

namespace Tests\Feature\Comments;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class showCommentsTest extends TestCase {
    use RefreshDatabase;
    use WithFaker;

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

    /** @test */
    public function list_of_comments_shows_on_idea_page() {
        $idea = Idea::factory()->create();

        $commentOne = Comment::factory()->create([
            'idea_id' => $idea->id,
            'body' => $this->faker->words(5, true)
        ]);

        $commentTwo = Comment::factory()->create([
            'idea_id' => $idea->id,
            'body' => $this->faker->words(5, true)
        ]);

        $this->get(route('idea.show', $idea))
            ->assertSeeInOrder([$commentOne->body, $commentTwo->body])
            ->assertSee('2 Comments');
    }
}
