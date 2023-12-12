<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
class Quote extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'explanation', 'author'];

    public function userDetail(): BelongsTo
    {
        return $this->belongsTo(UserDetail::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function scopeQuoted($query){
        $query->WHERE('quoted_at','<=', Carbon::now());
    }

    public function scopeTrending($query){
        $query->WHERE('quoted_at','<=', Carbon::now());
    }
}