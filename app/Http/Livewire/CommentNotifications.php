<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentNotifications extends Component {
    public function render() {
        return view('livewire.comment-notifications', [
            'notifications' => auth()->user()->unreadNotifications
        ]);
    }
}
