<?php

namespace App\Livewire;

use App\Models\Quote;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class QuoteList extends Component
{
    use WithPagination;

    #[Url()]
    public $sort = 'desc';

    public function setSort($sort) {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
        $this->resetPage();
    }

    #[Computed()]
    public function quotes(){
        return Quote::quoted()->orderBy('quoted_at',$this->sort )->paginate(5);
    }
    public function render()
    {
        return view('livewire.quote-list');
    }
}