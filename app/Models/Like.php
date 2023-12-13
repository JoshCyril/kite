<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    public function quotes()
    {
        return $this->morphedByMany(Quote::class, 'likeable');
    }



    /**

     * Get all of the videos that are assigned this tag.

     */

    public function userDetails()
    {
        return $this->morphedByMany(UserDetail::class, 'likeable');
    }

}