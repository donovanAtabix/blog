<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogpost extends Model
{
    //protected fillable = [];

    public function users()
    {
        $this->belongsTo(User::class);
    }
}
