<?php

namespace App\Policies;

use App\Models\Quote;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class QuotePolicy
{

    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isEditor()|| $user->isUser();
    }

    public function view(User $user, Quote $quote): bool
    {
        return $user->isAdmin() || $user->isEditor() || $user->isUser();
    }

    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isEditor() || $user->isUser();
    }

    public function update(User $user, Quote $quote): bool
    {
        return $user->isAdmin() || $user->isEditor()|| $user->isUser();
    }

    public function delete(User $user, Quote $quote): bool
    {
        return $user->isAdmin();
    }

    public function deleteAny(User $user): bool
    {
        return $user->isAdmin();
    }

    public function restore(User $user, Quote $quote): bool
    {
        return $user->isAdmin();
    }
    public function forceDelete(User $user, Quote $quote): bool
    {
        return $user->isAdmin();
    }

    public function restoreAny(User $user): bool
    {
        return $user->isAdmin();
    }
    public function forceDeleteAny(User $user): bool
    {
        return $user->isAdmin();
    }
}