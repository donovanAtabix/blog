<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    public function update(User $user, array $attributes)
    {
        $display_name = data_get($attributes, 'display_name');

        $user->switch_display_name = $display_name;
        $user->save();

        return $user;
    }
}
