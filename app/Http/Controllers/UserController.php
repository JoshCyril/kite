<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user)
    {
        return view(
            //
            );
    }

    public function show(User $user)
    {
        return view(
        'users.show',
        [
            'user' => $user
        ]

    );
    }
}
