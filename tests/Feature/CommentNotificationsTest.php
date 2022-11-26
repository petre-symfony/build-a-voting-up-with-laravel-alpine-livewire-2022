<?php

namespace Tests\Feature;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentNotificationsTest extends TestCase {
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function comment_notifications_livewire_component_renders_when_user_logged_in() {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('idea.index'));

        $response->assertSeeLivewire('comment-notifications');
    }

    /** @test */
    public function comment_notifications_livewire_component_does_not_renders_when_user_logged_in() {
        $user = User::factory()->create();

        $response = $this->get(route('idea.index'));

        $response->assertDontSeeLivewire('comment-notifications');
    }
}
