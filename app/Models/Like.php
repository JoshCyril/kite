<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Like extends Model
{
    use HasFactory;

    public function quotes(): MorphToMany
    {
        return $this->morphedByMany(Quote::class, 'likeable');
    }

    public function users(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'likeable');
    }

    public function related(): MorphOne
    {
        return $this->morphOne(Like::class, 'likeable');
    }

}