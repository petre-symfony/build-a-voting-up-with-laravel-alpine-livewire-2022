<?php

namespace Tests\Feature\Comments;

use App\Models\Idea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class addCommentsTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function add_comment_livewire_component_renders() {
        $idea = Idea::factory()->create();

        $response = $this->get(route('idea.show', $idea));
        $response->assertSeeLivewire('add-comment');
    }
}
