<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class EditIdea extends Component {
    public function render() {
        return view('livewire.edit-idea', [
            'categories' => Category::all()
        ]);
    }
}
