<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Pool;

return Http::get("https://reqres.in/api/users?page=2");

class ApiController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
    }


    function post()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('https://reqres.in/api/users', [
            'name' => 'morpheus',
            'job' => 'leader',
        ]);
        return $response;
    }


    function concurrent()
    {
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->get('https://reqres.in/api/users?page=2'),
            $pool->get('https://reqres.in/api/users/2'),
            $pool->get('https://reqres.in/api/users?page=2'),
        ]);

        return $responses[0]->ok() &&
            $responses[1]->ok() &&
            $responses[2]->ok();
    }

    function macro()
    {
        $response = Http::reqres()->get('/users?page=2');
        return $response;
    }
}