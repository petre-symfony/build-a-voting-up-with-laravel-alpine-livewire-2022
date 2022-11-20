<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class EditComment extends Component {
    public Comment $comment;
    public $body;

    protected $listeners = ['setEditComment'];
    protected $rules = [
        'body' => 'required|min:4'
    ];

    public function setEditComment($commentId){
        $this->comment = Comment::findOrFail($commentId);
        $this->body = $this->comment->body;

        $this->emit('editCommentWasSet');
    }

    public function updateComment(){
        $this->validate();
    }

    public function render() {
        return view('livewire.edit-comment');
    }
}
