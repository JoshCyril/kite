<?php

namespace App\Livewire;

use App\Models\Quote;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class QuoteComments extends Component
{
    use WithPagination;

    public Quote $quote;

    #[Rule('required|min:3|max:200')]
    public string $comment;

    public function quoteComment()
    {
        if (auth()->guest()) {
            return;
        }

        $this->validateOnly('comment');

        $this->quote->comments()->create([
            'comment' => $this->comment,
            'user_id' => auth()->id()
        ]);

        $this->reset('comment');
    }

    #[Computed()]
    public function comments()
    {
        return $this?->quote?->comments()->latest()->paginate(5);
    }


    public function render()
    {
        return view('livewire.quote-comments');
    }
}
