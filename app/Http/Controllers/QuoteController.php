<?php

namespace App\Http\Controllers;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        return view('quotes.index',
        [
            'quotes' => Quote::take(5)->get()
        ]

    );
    }
}