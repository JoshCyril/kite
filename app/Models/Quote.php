<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Quote extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['content', 'cover_image', 'explanation', 'author', 'slug', 'user_id', 'quoted_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }


    public function scopeQuoted($query){
        $query->where('quoted_at','<=', Carbon::now());
    }

    public function scopeFeatured($query){
        $query->where('featured',true);
    }

    public function scopeWithCategory($query, string $category)
    {
        $query->whereHas('categories', function ($query) use ($category) {
            $query->where('slug', $category);
        });
    }

    public function getReadingTime(){
        $mins = round(str_word_count($this->body) /250);
        return ($mins < 1) ? 1 : $mins;
    }

    public function getExcerpt(){
        return Str::limit(strip_tags($this->body),150);

    }

    public function getCoverImage(){
        $isUrl = str_contains($this->cover_image, 'http');
        return ($isUrl) ? $this->cover_image : Storage::disk('public')->url($this->cover_image);
    }

    protected $casts = [
        'quoted_at' => 'datetime',
    ];
}