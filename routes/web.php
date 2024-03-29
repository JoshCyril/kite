<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::get('/quote', [QuoteController::class,'index'])->name('quotes.index');

Route::get('/quote/{quote:slug}', [QuoteController::class,'show'])->name('quotes.show');

Route::get('/user/{user:name}', [UserController::class,'show'])->name('user.show');

Route::get('api',[ApiController::class,'post']);

Route::get('api/concurrent',[ApiController::class,'concurrent']);
Route::get('api/macro',[ApiController::class,'macro']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
});