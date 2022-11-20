<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class IdeaComment extends Component {
    public $comment;
    public $ideaUserId;

    protected $listeners = ['commentWasUpdated'];

    public function mount(Comment $comment, $ideaUserId){
        $this->comment = $comment;
        $this->ideaUserId = $ideaUserId;
    }

    public function commentWasUpdated(){
        $this->comment->refresh();
    }

    public function render() {
        return view('livewire.idea-comment', [
            'comment' => $this->comment
        ]);
    }
}
