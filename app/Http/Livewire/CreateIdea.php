<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CreateIdea extends Component {
    public $title;
    public $category = 1;
    public $description;

    public function render() {
        return view('livewire.create-idea', [
            'categories' => Category::all()
        ]);
    }
}
