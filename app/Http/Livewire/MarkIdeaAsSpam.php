<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Vote;
use Illuminate\Http\Response;
use Livewire\Component;

class MarkIdeaAsSpam extends Component {
    public $idea;

    public function mount(Idea $idea){
        $this->idea = $idea;
    }

    public function MarkIdeaAsSpam() {

    }

    public function render() {
        return view('livewire.mark-idea-as-spam');
    }
}
