<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentNotifications extends Component {
    public $notifications;
    public $notificationCount;

    protected $listeners = ['getNotifications'];

    public function mount(){
        $this->notifications = collect([]);
        $this->getNotificationCount();
    }

    public function getNotifications(){
        $this->notifications = auth()->user()->unreadNotifications;
    }

    public function getNotificationCount() {
        $this->notificationCount = auth()->user()->unreadNotifications()->count();
    }

    public function render() {
        return view('livewire.comment-notifications');
    }
}
