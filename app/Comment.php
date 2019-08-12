<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function parrent()
    {
        return $this->belongsTo(User::class, 'parrent_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
