<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('home',[
            'featuredQuotes' => Quote::Quoted()->Featured()->latest('quoted_at')->take(3)->get(),
            'latestQuotes' => Quote::Quoted()->take(9)->get()
        ]);
    }
}
