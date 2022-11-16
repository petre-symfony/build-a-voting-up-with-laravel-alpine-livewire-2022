<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use Livewire\Component;

class EditIdea extends Component {
    public $idea;
    public $title;
    public $category;
    public $description;

    public function mount(Idea $idea){
        $this->idea = $idea;
        $this->title = $idea->title;
        $this->category = $idea->category_id;
        $this->description = $idea->description;
    }

    protected $rules = [
        'title' => 'required|min:4',
        'category' => 'required|integer|exists:categories,id',
        'description' => 'required|min:4',
    ];

    public function updateIdea(){
        #Authorization
        $this->validate();
        $this->idea->update([
            'title' => $this->title,
            'category_id' => $this->category,
            'description' => $this->description
        ]);

        $this->emit('ideaWasUpdated');
    }

    public function render() {
        return view('livewire.edit-idea', [
            'categories' => Category::all()
        ]);
    }
}
