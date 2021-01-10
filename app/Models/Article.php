<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path() {
        return route('articles.show', $this);
    }

    public function author() {
        // $article->user;
        // AKA select * from user where article_id = $this->id (id of current article);
        return $this->belongsTo(User::class, 'user_id'); // Overrider the foreign key because it's naturally looking for author_id.
    }
}

//$article->user;
