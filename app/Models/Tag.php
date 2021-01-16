<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function articles() {
        // $tag->articles; -Returns all articles associated with that tag.
        return $this->belongsToMany(Article::class)->withTimestamps();
    }
}
