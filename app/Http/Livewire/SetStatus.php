<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Status;
use Livewire\Component;

class SetStatus extends Component {
    public $idea;
    public $status;

    public function mount(Idea $idea) {
        $this->idea = $idea;
        $this->status = $this->idea->status_id;
    }

    public function render() {
        return view('livewire.set-status', [
            'statuses' => Status::all()
        ]);
    }
}
