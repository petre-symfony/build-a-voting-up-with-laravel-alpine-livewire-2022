<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class EditComment extends Component {
    public Comment $comment;

    protected $listeners = ['setEditComment'];
    
    public function setEditComment($commentId){
        $this->comment = Comment::findOrFail($commentId);

        dd($this->comment->id);
    }

    public function render() {
        return view('livewire.edit-comment');
    }
}
