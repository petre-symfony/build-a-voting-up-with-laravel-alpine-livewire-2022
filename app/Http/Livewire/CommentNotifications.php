<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Response;
use Illuminate\Notifications\DatabaseNotification;
use Livewire\Component;

class CommentNotifications extends Component {
    const NOTIFICATION_THRESHOLD = 20;
    public $notifications;
    public $notificationCount;
    public $isLoading;

    protected $listeners = ['getNotifications'];

    public function mount(){
        $this->notifications = collect([]);
        $this->getNotificationCount();
        $this->isLoading = true;
    }

    public function getNotifications(){
        $this->notifications = auth()->user()
            ->unreadNotifications()
            ->latest()
            ->take(self::NOTIFICATION_THRESHOLD)
            ->get();

        $this->isLoading = false;
    }

    public function getNotificationCount() {
        $this->notificationCount = auth()->user()->unreadNotifications()->count();

        if ($this->notificationCount > self::NOTIFICATION_THRESHOLD) {
            $this->notificationCount = self::NOTIFICATION_THRESHOLD . '+';
        }
    }

    public function markAllAsRead(){
        #Authorization
        if(auth()->guest()){
            abort(Response::HTTP_FORBIDDEN);
        }

        auth()->user()->unreadNotifications->markAsRead();
        $this->getNotificationCount();
        $this->getNotifications();
    }

    public function markAsRead($notificationId){
        #Authorization
        if(auth()->guest()){
            abort(Response::HTTP_FORBIDDEN);
        }

        $notification = DatabaseNotification::findOrFail($notificationId);
        $notification->markAsRead();

        $idea = Idea::find($notification->data['idea_id']);
        $comment = Comment::find($notification->data['comment_id']);

        $comments = $idea->comments()->pluck('id');
        $indexOfComment = $comments->search($comment->id);

        $page = (int) ($indexOfComment / $comment->getPerPage()) + 1;

        session()->flash('scrollToComment', $comment->id);

        return redirect()->route('idea.show', [
            'idea' => $notification->data['idea_slug'],
            'page' => $page
        ]);
    }

    public function render() {
        return view('livewire.comment-notifications');
    }
}
