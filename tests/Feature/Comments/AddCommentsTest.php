<?php

namespace Tests\Feature\Comments;

use App\Http\Livewire\AddComment;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\User;
use App\Notifications\CommentAdded;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Livewire\Livewire;
use Tests\TestCase;

class addCommentsTest extends TestCase {
    use RefreshDatabase;
    use WithFaker;

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

    /** @test */
    public function add_comment_form_validation_works() {
        $user = User::factory()->create();
        $idea = Idea::factory()->create();

        Livewire::actingAs($user)
            ->test(AddComment::class, [
               'idea' => $idea
            ])
            ->set('comment', '')
            ->call('addComment')
            ->assertHasErrors(['comment'])
            ->set('comment', 'ab')
            ->call('addComment')
            ->assertHasErrors(['comment']);
    }

    /** @test */
    public function add_comment_form_works() {
        $user = User::factory()->create();
        $idea = Idea::factory()->create();

        Notification::fake();
        Notification::assertNothingSent();

        Livewire::actingAs($user)
            ->test(AddComment::class, [
                'idea' => $idea
            ])
            ->set('comment', $this->faker->words(5, true))
            ->call('addComment')
            ->assertEmitted('commentWasAdded');

        Notification::assertSentTo(
            [$idea->user],
            CommentAdded::class
        );

        $this->assertEquals(1, Comment::count());
        $this->assertEquals(Comment::all()->first()->body, $idea->comments->first()->body);
    }
}
