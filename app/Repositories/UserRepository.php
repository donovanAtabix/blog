<?php

namespace App\Repositories;

use App\User;
use Illuminate\Http\Request;

class UserRepository
{
    public function store(Request $request)
    {
        auth()->user()->clearMediaCollection('avatar');
        auth()->user()->addMedia($request->profile)->preservingOriginal()->toMediaCollection('avatar');
    }

    public function update(User $user, array $attributes)
    {
        $display_name = data_get($attributes, 'display_name');

        $user->switch_display_name = $display_name;
        $user->save();
    }

    public function destroy()
    {
        $user = auth()->user();

        $user->clearMediaCollection('avatar');

        return $user;
    }

    public function avatarImage()
    {
        auth()->user()->addMedia(storage_path('/app/demo/image-avatar.png'))
            ->preservingOriginal()->toMediaCollection('avatar');
    }
}
