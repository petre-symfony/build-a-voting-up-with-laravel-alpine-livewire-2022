<?php

namespace Tests\Feature;

use App\Http\Livewire\IdeasIndex;
use App\Http\Livewire\StatusFilters;
use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class StatusFiltersTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function index_page_contains_status_filters_livewire_component(){

        Idea::factory()->create();

        $this->get(route('idea.index'))
            ->assertSeeLivewire('status-filters');
    }

    /** @test */
    public function show_page_contains_status_filters_livewire_component(){

        $idea = Idea::factory()->create();

        $this->get(route('idea.show', $idea))
            ->assertSeeLivewire('status-filters');
    }

    /** @test */
    public function shows_correct_status_count(){
        $user = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $statusImplemented = Status::factory()->create(['id' => 4, 'name' => 'Implemented']);

        Idea::factory()->create(['status_id' => $statusImplemented->id]);

        Idea::factory()->create(['status_id' => $statusImplemented->id]);

        Livewire::test(StatusFilters::class)
            ->assertSee('All Ideas (2)')
            ->assertSee('Implemented (2)');
    }

    /** @test */
    public function filtering_works_when_query_string_in_place(){

        $statusConsidering = Status::factory()->create(['name' => 'Considering', 'classes' => 'bg-purple text-white']);
        $statusInProgress = Status::factory()->create(['name' => 'In Progress', 'classes' => 'bg-yellow text-white']);

        Idea::factory()->create(['status_id' => $statusInProgress->id]);

        Idea::factory()->create(['status_id' => $statusInProgress->id]);

        Idea::factory()->create(['status_id' => $statusConsidering->id]);

        Idea::factory()->create(['status_id' => $statusConsidering->id]);

        Idea::factory()->create(['status_id' => $statusConsidering->id]);

        Livewire::withQueryParams(['status' => 'In Progress'])
            ->test(IdeasIndex::class)
            ->assertViewHas('ideas', function($ideas){
                return $ideas->count() == 2
                    && $ideas->first()->status->name == 'In Progress';
            });
    }

    /** @test */
    public function show_page_doesnt_show_selected_status(){

        Idea::factory()->create();

        $idea = Idea::factory()->create();

        $response = $this->get(route('idea.show', $idea));

        $response->assertDontSee('border-blue text-gray-900');
    }

    /** @test */
    public function index_page_shows_selected_status(){

        Idea::factory()->create();

        $idea = Idea::factory()->create();

        $response = $this->get(route('idea.index'));

        $response->assertSee('border-blue text-gray-900');
    }
}
