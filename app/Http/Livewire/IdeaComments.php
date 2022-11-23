<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Idea;
use Livewire\Component;
use Livewire\WithPagination;

class IdeaComments extends Component {
    use WithPagination;

    public $idea;

    public function mount(Idea $idea){
        $this->idea = $idea;
    }

    protected $listeners = ['commentWasAdded', 'commentWasDeleted', 'statusWasUpdated'];

    public function commentWasAdded() {
        $this->idea->refresh();
        $this->gotoPage($this->idea->comments()->paginate()->lastPage());
    }

    public function commentWasDeleted() {
        $this->idea->refresh();
        $this->gotoPage(1);
    }

    public function statusWasUpdated() {
        $this->idea->refresh();
        $this->gotoPage($this->idea->comments()->paginate()->lastPage());
    }

    public function render() {
        return view('livewire.idea-comments', [
            //'comments' => $this->idea->comments()->load('user')->paginate()->withQueryString() - dont work
            'comments' => Comment::with('user')->where('idea_id', $this->idea->id)->paginate()->withQueryString()
        ]);
    }
}
