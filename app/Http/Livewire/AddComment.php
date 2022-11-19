<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class AddComment extends Component {
    public $idea;

    public function mount(Idea $idea){
        $this->idea = $idea;
    }

    public function render() {
        return view('livewire.add-comment');
    }
}
