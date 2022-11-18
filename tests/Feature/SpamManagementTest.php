<?php

namespace Tests\Feature;

use App\Http\Livewire\DeleteIdea;
use App\Http\Livewire\IdeaShow;
use App\Http\Livewire\MarkIdeaAsSpam;
use App\Models\Category;
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
    public function shows_mark_as_spam_livewire_component_when_user_has_authorization() {
        $user = User::factory()->create();
        $idea = Idea::factory()->create();

        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('mark-idea-as-spam');
    }

    /** @test */
    public function does_not_show_mark_as_spam_livewire_component_when_user_does_not_have_authorization() {
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
}
