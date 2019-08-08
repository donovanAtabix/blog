<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['owner_id', 'parrent_id', 'comment'];

    public function post()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function comment()
    {
        return $this->belongsTo(User::class, 'parrent_id');
    }
}
