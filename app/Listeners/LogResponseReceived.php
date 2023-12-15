<?php
namespace App\Listeners;
use Illuminate\Http\Client\Events\ResponseReceived;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
class LogResponseReceived
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request, Response $response)
    {
        Log::channel('stderr')->info($response->status());
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Http\Client\Events\ResponseReceived  $event
     * @return void
     */
    public function handle(ResponseReceived $event)
    {

    }
}