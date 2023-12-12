<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Relations\MorphOne;
class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = ['user_name', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}