<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'post', 'owner_id'];

    public function user()
    {
        $this->belongsTo(User::class, 'owner_id');
    }
}
