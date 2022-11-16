<?php

namespace Tests\Feature;

use App\Http\Livewire\EditIdea;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditIdeaTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function show_edit_idea_livewire_component_when_user_has_authorization() {
        $user = User::factory()->create();
        $idea = Idea::factory()->create([
            'user_id' => $user->id
        ]);

        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('edit-idea');
    }

    /** @test */
    public function does_not_show_edit_idea_livewire_component_when_user_does_not_have_authorization() {
        $user = User::factory()->create();
        $idea = Idea::factory()->create([
            'user_id' => $user->id
        ]);

        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('edit-idea');
    }
}
