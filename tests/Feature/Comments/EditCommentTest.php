<?php

namespace Tests\Feature\Comments;

use App\Http\Livewire\CreateIdea;
use App\Http\Livewire\EditIdea;
use App\Http\Livewire\IdeaShow;
use App\Models\Category;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Livewire\Livewire;
use Tests\TestCase;

class EditCommentTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function show_edit_comment_livewire_component_when_user_has_authorization() {
        $user = User::factory()->create();
        $idea = Idea::factory()->create();

        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('edit-comment');
    }

    /** @test */
    public function does_not_show_edit_comment_livewire_component_when_user_does_not_have_authorization() {
        $idea = Idea::factory()->create();

        $this->get(route('idea.show', $idea))
            ->assertDontSeeLivewire('edit-comment');
    }

    /** @test */
    public function edit_idea_form_validation_works() {
        $user = User::factory()->create();
        $idea = Idea::factory()->create([
            'user_id' => $user->id
        ]);

        Livewire::actingAs($user)
            ->test(EditIdea::class, [
                'idea' => $idea
            ])
            ->set('title', '')
            ->set('category', '')
            ->set('description', '')
            ->call('updateIdea')
            ->assertHasErrors(['title', 'category', 'description'])
            ->assertSee('The title field is required');
    }

    /** @test */
    public function editing_an_idea_works_when_user_has_authorization() {
        $user = User::factory()->create();
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $categoryTwo = Category::factory()->create(['name' => 'Category 2']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id
        ]);

        Livewire::actingAs($user)
            ->test(EditIdea::class, [
                'idea' => $idea
            ])
            ->set('title', 'My Edited Idea')
            ->set('category', $categoryTwo->id)
            ->set('description', 'This is my edited idea')
            ->call('updateIdea')
            ->assertEmitted('ideaWasUpdated');

        $this->assertDatabaseHas('ideas', [
            'category_id' => $categoryTwo->id,
            'title' => 'My Edited Idea',
            'description' => 'This is my edited idea'
        ]);
    }

    /** @test */
    public function editing_an_idea_does_not_work_when_user_has_no_authorization_because_different_user_created_idea() {
        $user = User::factory()->create();
        $userB = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $categoryTwo = Category::factory()->create(['name' => 'Category 2']);

        $idea = Idea::factory()->create([
            'user_id' => $userB->id,
            'category_id' => $categoryOne->id
        ]);

        Livewire::actingAs($user)
            ->test(EditIdea::class, [
                'idea' => $idea
            ])
            ->set('title', 'My Edited Idea')
            ->set('category', $categoryTwo->id)
            ->set('description', 'This is my edited idea')
            ->call('updateIdea')
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    public function editing_an_idea_does_not_work_when_user_has_no_authorization_because_idea_was_created_longer_than_an_hour_ago() {
        $user = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $categoryTwo = Category::factory()->create(['name' => 'Category 2']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'created_at' => now()->subHours(2)
        ]);

        Livewire::actingAs($user)
            ->test(EditIdea::class, [
                'idea' => $idea
            ])
            ->set('title', 'My Edited Idea')
            ->set('category', $categoryTwo->id)
            ->set('description', 'This is my edited idea')
            ->call('updateIdea')
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    public function editing_an_idea_shows_on_menu_when_user_has_authorization() {
        $user = User::factory()->create();

        $idea = Idea::factory()->create([
            'user_id' => $user->id
        ]);

        Livewire::actingAs($user)
            ->test(IdeaShow::class, [
                'idea' => $idea,
                'votesCount' => 1
            ])
            ->assertSee('Edit Idea');
    }

    /** @test */
    public function editing_an_idea_dont_show_on_menu_when_user_has_no_authorization() {
        $user = User::factory()->create();

        $idea = Idea::factory()->create();

        Livewire::actingAs($user)
            ->test(IdeaShow::class, [
                'idea' => $idea,
                'votesCount' => 1
            ])
            ->assertDontSee('Edit Idea');
    }
}
