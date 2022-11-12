<?php

namespace Tests\Feature;

use App\Http\Livewire\CreateIdea;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateIdeaTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function create_ideas_form_does_not_show_when_logged_out() {
        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();
        $response->assertSee('Please login to create an idea');
        $response->assertDontSee('Let us know what you would like and we\'ll take a look over!');
    }

    /** @test */
    public function create_ideas_form_does_show_when_logged_in() {
        $response = $this->actingAs(User::factory()->create())->get(route('idea.index'));

        $response->assertSuccessful();
        $response->assertDontSee('Please login to create an idea');
        $response->assertSee('Let us know what you would like and we\'ll take a look over!', false);
    }

    /** @test */
    public function main_page_contains_create_idea_livewire_component() {
        $this->actingAs(User::factory()->create())
            ->get(route('idea.index'))
            ->assertSeeLivewire('create-idea');
    }

    /** @test */
    public function create_idea_form_validation_works() {
        Livewire::actingAs(User::factory()->create())
            ->test(CreateIdea::class)
            ->set('title', '')
            ->set('category', '')
            ->set('description', '')
            ->call('createIdea')
            ->assertHasErrors(['title', 'category', 'description'])
            ->assertSee('The title field is required');
    }
}
