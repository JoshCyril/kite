<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'explanation', 'author'];

    public function userDetail(): BelongsTo
    {
        return $this->belongsTo(UserDetail::class);
    }
}