<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisplayName extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function avatarName($avatarName = true)
    {
        return $this->update(compact('avatarName'));
    }

    public function firstName()
    {
        $this->avatarName(false);
    }
}
