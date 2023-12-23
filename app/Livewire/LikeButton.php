<?php

namespace App\Livewire;

use App\Models\Quote;
use App\Models\Likeable;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class LikeButton extends Component
{
    public Quote $quote;


    public function toggleLike()
    {
        if (auth()->guest()) {
            return $this->redirect(route('login'), true);
        }

        $user = auth()->user();

        // $likes = Like::get();

        // dd($likes);

        // $quotes = $likes->quotes()->get()->map(fn($quote)=>[
        //     'id' => $quote->id,
        //     'title' => $quote->id,
        //     'type' => 'quote',
        // ]);

        // $users = $likes->users()->get()->map(fn($q)=>[
        //     'id' => $q->id,
        //     'title' => $q->id,
        //     'type' => 'user',
        // ]);

        // $results = collect()->merge($quotes)->merge($users);


        // use App\Models\Like
        // use App\Models\Quote
        // $q = Quote::find(1)
        // $l = new Like
        // $l->name = "I cant"
        // $q->likes()->save($l)

        // $tags = Likeable::with(['likeable'])->get();
        // $tags->map(function ($tag) {
        // return [
        //     'id' => $tag->taggable->id,
        //     'title' => $tag->taggable->type
        // ];
        // });

        // dd($tags);

        // $s = DB::table('likeables')
        //     ->where('likeable_id', $this->quote->id)
        //     ->where('likeable_type', 'App\Models\Quote');




        // if ($user->hasLiked($this->quote)) {
        //     $user->likes()->detach($this->quote);
        //     return;
        // }

        // $user->likes()->attach($this->quote);
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}