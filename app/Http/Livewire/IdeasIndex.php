<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\Vote;
use Livewire\Component;
use Livewire\WithPagination;

class IdeasIndex extends Component {
    use WithPagination;

    public $status;
    public $category;
    public $filter;

    protected $queryString = [
        'status',
        'category',
        'filter'
    ];

    public function mount() {
        $this->status =request()->status ?? 'All';
    }

    protected $listeners = ['queryStringUpdatedStatus']; //the same as 'queryStringUpdatedStatus' => 'queryStringUpdatedStatus'

    public function updatingStatus() {
        $this->resetPage();
    }

    public function updatingCategory() {
        $this->resetPage();
    }

    public function queryStringUpdatedStatus($newStatus) {
        $this->updatingStatus();
        $this->status = $newStatus;
    }

    public function render() {
        $statuses = Status::all()->pluck('id', 'name');
        $categories = Category::all();

        return view('livewire.ideas-index', [
            'ideas' => Idea::with('user', 'category', 'status')
                ->when($this->status && $this->status !== 'All', function($query) use ($statuses){
                    return $query->where('status_id', $statuses->get($this->status));
                })
                ->when($this->category && $this->category !== 'All Categories', function($query) use ($categories){
                    return $query->where('category_id', $categories->pluck('id', 'name')->get($this->category));
                })
                ->when($this->filter && $this->filter === 'Top Voted', function($query) {
                    return $query->orderByDesc('votes_count');
                })
                ->withCount('votes')
                ->addSelect(['voted_by_user' => Vote::select('id')
                    ->where('user_id', auth()->id())
                    ->whereColumn('idea_id', 'ideas.id')
                ])
                ->orderBy('id', 'desc')
                ->simplePaginate(Idea::PAGINATION_COUNT),
            'categories' => $categories
        ]);
    }
}
