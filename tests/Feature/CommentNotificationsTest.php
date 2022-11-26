<?php

namespace Tests\Feature;

use App\Http\Livewire\AddComment;
use App\Http\Livewire\CommentNotifications;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
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

    /** @test */
    public function notifications_show_for_logged_in_user(){
        $user = User::factory()->create();
        $idea = Idea::factory()->create([
            'user_id' => $user->id
        ]);

        $userACommenting = User::factory()->create();
        $userBCommenting = User::factory()->create();

        Livewire::actingAs($userACommenting)
            ->test(AddComment::class, [
                'idea' => $idea
            ])
            ->set('comment', $this->faker->words(5, true))
            ->call('addComment');


        Livewire::actingAs($userBCommenting)
            ->test(AddComment::class, [
                'idea' => $idea
            ])
            ->set('comment', $this->faker->words(5, true))
            ->call('addComment');

        Livewire::actingAs($user)
            ->test(CommentNotifications::class)
            ->call('getNotifications')
            ->assertSeeInOrder([$userBCommenting->comments()->first()->body, $userACommenting->comments()->first()->body])
        ;
    }
}