<?php

namespace Tests\Feature;

use App\Http\Livewire\DeleteIdea;
use App\Http\Livewire\IdeaComment;
use App\Http\Livewire\IdeaIndex;
use App\Http\Livewire\IdeaShow;
use App\Http\Livewire\MarkCommentAsNotSpam;
use App\Http\Livewire\MarkCommentAsSpam;
use App\Http\Livewire\MarkIdeaAsNotSpam;
use App\Http\Livewire\MarkIdeaAsSpam;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Livewire\Livewire;
use Tests\TestCase;

class SpamManagementTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function shows_mark_idea_as_spam_livewire_component_when_user_has_authorization() {
        $user = User::factory()->create();
        $idea = Idea::factory()->create();

        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('mark-idea-as-spam');
    }

    /** @test */
    public function does_not_show_mark_idea_as_spam_livewire_component_when_user_does_not_have_authorization() {
        $idea = Idea::factory()->create();

        $this->get(route('idea.show', $idea))
            ->assertDontSeeLivewire('mark-idea-as-spam');
    }

    /** @test */
    public function marking_an_idea_as_spam_works_when_user_has_authorization() {
        $user = User::factory()->create();

        $idea = Idea::factory()->create();

        Livewire::actingAs($user)
            ->test(MarkIdeaAsSpam::class, [
                'idea' => $idea
            ])
            ->call('markIdeaAsSpam')
            ->assertEmitted('ideaWasMarkedAsSpam');

        $this->assertEquals(1, Idea::first()->spam_reports);
    }

    /** @test */
    public function marking_an_idea_as_spam_does_not_work_when_user_does_not_have_authorization() {
        $idea = Idea::factory()->create();

        Livewire::test(MarkIdeaAsSpam::class, [
                'idea' => $idea
            ])
            ->call('markIdeaAsSpam')
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    public function marking_an_idea_as_spam__shows_on_menu_when_user_has_authorization() {
        $user = User::factory()->create();

        $idea = Idea::factory()->create();

        Livewire::actingAs($user)
            ->test(IdeaShow::class, [
                'idea' => $idea,
                'votesCount' => 1
            ])
            ->assertSee('Mark as spam');
    }

    /** @test */
    public function marking_an_idea_as_spam_dont_show_on_menu_when_user_has_no_authorization() {
        $idea = Idea::factory()->create();

        Livewire::test(IdeaShow::class, [
                'idea' => $idea,
                'votesCount' => 1
            ])
            ->assertDontSee('Mark as spam');
    }

    /** @test */
    public function shows_mark_as_not_spam_livewire_component_when_user_has_authorization() {
        $user = User::factory()->admin()->create();
        $idea = Idea::factory()->create([
            'spam_reports' => 1
        ]);


        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('mark-idea-as-not-spam');
    }

    /** @test */
    public function does_not_show_mark_as_not_spam_livewire_component_when_user_does_not_have_authorization() {
        $idea = Idea::factory()->create();

        $this->get(route('idea.show', $idea))
            ->assertDontSeeLivewire('mark-idea-as-not-spam');
    }

    /** @test */
    public function marking_an_idea_as_not_spam_works_when_user_has_authorization() {
        $user = User::factory()->admin()->create();

        $idea = Idea::factory()->create([
            'spam_reports' => 1
        ]);

        Livewire::actingAs($user)
            ->test(MarkIdeaAsNotSpam::class, [
                'idea' => $idea
            ])
            ->call('markIdeaAsNotSpam')
            ->assertEmitted('ideaWasMarkedAsNotSpam');

        $this->assertEquals(0, Idea::first()->spam_reports);
    }

    /** @test */
    public function marking_an_idea_as_not_spam_does_not_work_when_user_does_not_have_authorization() {
        $idea = Idea::factory()->create();

        Livewire::test(MarkIdeaAsNotSpam::class, [
            'idea' => $idea
        ])
            ->call('markIdeaAsNotSpam')
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    public function marking_an_idea_as_not_spam_shows_on_menu_when_user_has_authorization() {
        $user = User::factory()->admin()->create();

        $idea = Idea::factory()->create([
            'spam_reports' => 1
        ]);

        Livewire::actingAs($user)
            ->test(IdeaShow::class, [
                'idea' => $idea,
                'votesCount' => 1
            ])
            ->assertSee('Not Spam');
    }

    /** @test */
    public function marking_an_idea_as_not_spam_dont_show_on_menu_when_user_has_no_authorization() {
        $idea = Idea::factory()->create();

        Livewire::test(IdeaShow::class, [
            'idea' => $idea,
            'votesCount' => 1
        ])
            ->assertDontSee('Not Spam');
    }

    /** @test */
    public function spam_reports_count_shows_on_ideas_index_page_if_logged_in_as_admin() {
        $user = User::factory()->admin()->create();

        $idea = Idea::factory()->create([
            'spam_reports' => 3
        ]);

        Livewire::actingAs($user)
            ->test(IdeaIndex::class, [
            'idea' => $idea,
            'votesCount' => 1
        ])
            ->assertSee('Spam Reports: 3');
    }

    /** @test */
    public function spam_reports_count_shows_on_ideas_show_page_if_logged_in_as_admin() {
        $user = User::factory()->admin()->create();

        $idea = Idea::factory()->create([
            'spam_reports' => 3
        ]);

        Livewire::actingAs($user)
            ->test(IdeaShow::class, [
                'idea' => $idea,
                'votesCount' => 1
            ])
            ->assertSee('Spam Reports: 3');
    }

    /** @test */
    public function shows_mark_comment_as_spam_livewire_component_when_user_has_authorization() {
        $user = User::factory()->create();
        $idea = Idea::factory()->create();

        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('mark-comment-as-spam');
    }

    /** @test */
    public function does_not_show_mark_comment_as_spam_livewire_component_when_user_does_not_have_authorization() {
        $idea = Idea::factory()->create();

        $this->get(route('idea.show', $idea))
            ->assertDontSeeLivewire('mark-comment-as-spam');
    }

    /** @test */
    public function marking_a_comment_as_spam_works_when_user_has_authorization() {
        $user = User::factory()->create();

        $comment = Comment::factory()->create();

        Livewire::actingAs($user)
            ->test(MarkCommentAsSpam::class)
            ->call('setMarkAsSpamComment', $comment->id)
            ->assertEmitted('markAsSpamCommentWasSet')
            ->call('markAsSpam')
            ->assertEmitted('commentWasMarkedAsSpam');

        $this->assertEquals(1, Comment::first()->spam_reports);
    }

    /** @test */
    public function marking_a_comment_as_spam_does_not_work_when_user_does_not_have_authorization() {
        $comment = Comment::factory()->create();

        Livewire::test(MarkCommentAsSpam::class)
            ->call('setMarkAsSpamComment', $comment->id)
            ->assertEmitted('markAsSpamCommentWasSet')
            ->call('markAsSpam')
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    public function marking_a_comment_as_spam_shows_on_menu_when_user_has_authorization() {
        $user = User::factory()->create();

        $idea = Idea::factory()->create();

        $comment = Comment::factory()->create();

        Livewire::actingAs($user)
            ->test(IdeaComment::class, [
                'comment' => $comment,
                'ideaUserId' => $idea->user_id
            ])
            ->assertSee('Mark as Spam');
    }

    /** @test */
    public function marking_a_comment_as_spam_dont_show_on_menu_when_user_has_no_authorization() {
        $idea = Idea::factory()->create();

        $comment = Comment::factory()->create();

        Livewire::test(IdeaComment::class, [
                'comment' => $comment,
                'ideaUserId' => $idea->user_id
            ])
            ->assertDontSee('Mark as Spam');
    }

    /** @test */
    public function shows_mark_comment_as_not_spam_livewire_component_when_user_has_authorization() {
        $user = User::factory()->admin()->create();
        $idea = Idea::factory()->create();

        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('mark-comment-as-not-spam');
    }

    /** @test */
    public function does_not_show_mark_comment_as_not_spam_livewire_component_when_user_does_not_have_authorization() {
        $user = User::factory()->create();
        $idea = Idea::factory()->create();

        $this->actingAs($user)->get(route('idea.show', $idea))
            ->assertDontSeeLivewire('mark-comment-as-not-spam');
    }

    /** @test */
    public function marking_a_comment_as_not_spam_works_when_user_has_authorization() {
        $user = User::factory()->admin()->create();

        $comment = Comment::factory()->create([
            'spam_reports' => 4
        ]);

        Livewire::actingAs($user)
            ->test(MarkCommentAsNotSpam::class)
            ->call('setMarkAsNotSpamComment', $comment->id)
            ->assertEmitted('markAsNotSpamCommentWasSet')
            ->call('markAsNotSpam')
            ->assertEmitted('commentWasMarkedAsNotSpam');

        $this->assertEquals(0, Comment::first()->spam_reports);
    }

    /** @test */
    public function marking_a_comment_as_not_spam_does_not_work_when_user_does_not_have_authorization() {
        $user = User::factory()->create();
        $comment = Comment::factory()->create([
            'spam_reports' => 4
        ]);

        Livewire::actingAs($user)
            ->test(MarkCommentAsNotSpam::class)
            ->call('setMarkAsNotSpamComment', $comment->id)
            ->assertEmitted('markAsNotSpamCommentWasSet')
            ->call('markAsNotSpam')
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    public function marking_a_comment_as_not_spam_shows_on_menu_when_user_has_authorization() {
        $user = User::factory()->admin()->create();

        $idea = Idea::factory()->create();

        $comment = Comment::factory()->create();

        Livewire::actingAs($user)
            ->test(IdeaComment::class, [
                'comment' => $comment,
                'ideaUserId' => $idea->user_id
            ])
            ->assertSee('Mark as Not Spam');
    }

    /** @test */
    public function marking_a_comment_as_not_spam_dont_show_on_menu_when_user_has_no_authorization() {
        $user = User::factory()->create();
        $idea = Idea::factory()->create();

        $comment = Comment::factory()->create();

        Livewire::actingAs($user)
            ->test(IdeaComment::class, [
                'comment' => $comment,
                'ideaUserId' => $idea->user_id
            ])
            ->assertDontSee('Mark as Not Spam');
    }

    /** @test */
    public function spam_reports_count_shows_on_idea_comment_livewire_template_if_logged_in_as_admin() {
        $user = User::factory()->admin()->create();

        $idea = Idea::factory()->create();

        $comment = Comment::factory()->create([
            'idea_id' => $idea->id,
            'spam_reports' => 10
        ]);

        Livewire::actingAs($user)
            ->test(IdeaComment::class, [
                'comment' => $comment,
                'ideaUserId' => $idea->user_id
            ])
            ->assertSee('Spam Reports: 10');
    }
}
