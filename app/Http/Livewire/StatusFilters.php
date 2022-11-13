<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StatusFilters extends Component {
    public $status = 'All';

    protected $queryString = [
        'status'
    ];

    public function render() {
        return view('livewire.status-filters');
    }
}
