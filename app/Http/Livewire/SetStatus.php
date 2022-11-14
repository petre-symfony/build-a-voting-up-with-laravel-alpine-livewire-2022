<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class SetStatus extends Component {
    public $idea;

    public function mount(Idea $idea) {
        $this->idea = $idea;
    }

    public function render() {
        return view('livewire.set-status');
    }
}
