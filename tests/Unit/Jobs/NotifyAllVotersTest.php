<?php

namespace Tests\Unit\Jobs;

use App\Jobs\NotifyAllVoters;
use App\Mail\IdeaStatusUpdatedMailable;
use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class NotifyAllVotersTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function it_sends_an_email_to_all_voters() {
        $user = User::factory()->create([
            'email' => 'andre_madarang@hotmail.com'
        ]);

        $userB = User::factory()->create([
            'email' => 'userg@user.com'
        ]);

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $statusConsidering = Status::factory()->create(['id' => 2, 'name' => 'Considering']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'status_id' => $statusConsidering->id
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $userB->id
        ]);

        Mail::fake();

        NotifyAllVoters::dispatch($idea);

        Mail::assertQueued(IdeaStatusUpdatedMailable::class, function($mail) use ($user){
            return $mail->hasTo($user->email)
                && $mail->hasSubject('An idea you voted for has a new status');
        });

        Mail::assertQueued(function (IdeaStatusUpdatedMailable $mail) use ($userB) {
            return $mail->hasTo($userB->email)
                && $mail->hasSubject('An idea you voted for has a new status');
        });
    }
}
