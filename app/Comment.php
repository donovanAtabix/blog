<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['description'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    // @todo: Probeer deze stap te verwijderen en een "parent" via de post() relation op te halen.
    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
