<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quote;
class QuoteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        return view(
        'quotes.index',
        [
            'categories' => Category::
            whereHas('quotes', function($query){
                $query->quoted();
            })->take(10)->get()
        ]

    );
    }

    public function show(Quote $quote)
    {
        return view(
        'quotes.show',
        [
            'quote' => $quote
        ]

    );
    }
}