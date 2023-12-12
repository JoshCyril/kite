<?php

namespace App\Http\Controllers;

use App\Models\Category;

class QuoteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        return view('quotes.index',
        [
            'categories' => Category::whereHas('quotes', function($query){
                $query->quoted();
            })->take(10)->get()
        ]

    );
    }
}