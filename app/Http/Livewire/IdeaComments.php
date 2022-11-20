<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use Livewire\WithPagination;

class IdeaComments extends Component {
    use WithPagination;

    public $idea;

    public function mount(Idea $idea){
        $this->idea = $idea;
    }

    protected $listeners = ['commentWasAdded'];

    public function commentWasAdded() {
        $this->idea->refresh();
    }

    public function render() {
        return view('livewire.idea-comments', [
            'comments' => $this->idea->comments()->paginate()->withQueryString()
        ]);
    }
}
