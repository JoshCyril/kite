<?php

namespace App\Livewire;

use App\Models\Quote;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class QuoteList extends Component
{
    use WithPagination;
    #[Computed()]
    public function quotes(){
        return Quote::quoted()->orderBy('quoted_at', 'desc')->paginate(5);
    }
    public function render()
    {
        return view('livewire.quote-list');
    }
}