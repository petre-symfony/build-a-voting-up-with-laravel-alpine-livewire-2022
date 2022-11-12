<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowIdeasTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function list_of_ideas_shows_on_main_page() {
        $categoryOne = Category::factory()
            ->create(['name' => 'Category 1']);
        $categoryTwo = Category::factory()
            ->create(['name' => 'Category 2']);

        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);
        $statusConsidering = Status::factory()->create(['name' => 'Considering', 'classes' => 'bg-purple text-white']);

        $ideaOne = Idea::factory()->create([
            'title' => 'My First Idea',
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description of my first idea'
        ]);
        $ideaTwo = Idea::factory()->create([
            'title' => 'My Second Idea',
            'category_id' => $categoryTwo->id,
            'status_id' => $statusConsidering->id,
            'description' => 'Description of my second idea'
        ]);

        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();
        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->description);
        $response->assertSee($categoryOne->name);
        $response->assertSee(`<div class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">Open</div>`, false);
        $response->assertSee($ideaTwo->title);
        $response->assertSee($ideaTwo->description);
        $response->assertSee($categoryTwo->name);
        $response->assertSee(`<div class="bg-purple text-white text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">Open</div>`, false);
    }

    /** @test */
    public function single_idea_shows_correctly_on_the_show_page() {
        $categoryOne = Category::factory()
            ->create(['name' => 'Category 1']);

        $idea = Idea::factory()->create([
            'title' => 'My First Idea',
            'category_id' => $categoryOne->id,
            'description' => 'Description of my first idea'
        ]);

        $response = $this->get(route('idea.show', $idea));

        $response->assertSuccessful();
        $response->assertSee($idea->title);
        $response->assertSee($idea->description);
        $response->assertSee($categoryOne->name);
    }

    /** @test */
    public function ideas_pagination_works(){
        Idea::factory(Idea::PAGINATION_COUNT + 1)->create();

        $ideaOne = Idea::find(1);
        $ideaOne->title = 'My First Idea';
        $ideaOne->save();

        $ideaEleven = Idea::find(11);
        $ideaEleven->title = 'My Eleventh Idea';
        $ideaEleven->save();

        $response = $this->get('/');
        $response->assertSee($ideaOne->title);
        $response->assertDontSee($ideaEleven->title);

        $response = $this->get('/?page=2');
        $response->assertDontSee($ideaOne->title);
        $response->assertSee($ideaEleven->title);
    }

    /** @test */
    public function same_idea_title_different_slugs(){
        $ideaOne = Idea::factory()->create([
            'title' => 'My First Idea',
            'description' => 'Description of my first idea'
        ]);
        $ideaTwo = Idea::factory()->create([
            'title' => 'My First Idea',
            'description' => 'Another description for my first idea'
        ]);

        $response = $this->get(route('idea.show', $ideaOne));

        $response->assertSuccessful();
        $this->assertTrue(request()->path() === 'ideas/my-first-idea');

        $response = $this->get(route('idea.show', $ideaTwo));

        $response->assertSuccessful();
        $this->assertTrue(request()->path() === 'ideas/my-first-idea-2');
    }


}
