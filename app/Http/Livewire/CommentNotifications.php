<?php

namespace App\Http\Livewire;

use Illuminate\Http\Response;
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
    }

    public function render() {
        return view('livewire.comment-notifications');
    }
}
