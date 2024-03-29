<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Quote;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

use function Laravel\Prompts\search;

class QuoteList extends Component
{
    use WithPagination;

    #[Url()]
    public $sort = 'desc';

    #[Url()]
    public $category = '';

    #[Url()]
    public $search = '';

    public function setSort($sort) {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
        $this->resetPage();
    }

    #[On('search')]
    public function updateSearch($search){
        $this->search = $search;
        $this->resetPage();
    }

    public function clearFilters(){
        $this->search = '';
        $this->category = '';
        $this->resetPage();
    }

    #[Computed()]
    public function quotes(){
        return Quote::quoted()
            ->orderBy('quoted_at',$this->sort )
            ->when($this->activeCategory, function($query){
                $query->withCategory($this->category);
            })
            ->where('content','like',"%{$this->search}%")
            ->paginate(3);
    }

    #[Computed()]
    public function activeCategory()
    {
        return Category::where('slug', $this->category)->first();
    }

    public function render()
    {
        return view('livewire.quote-list');
    }
}
