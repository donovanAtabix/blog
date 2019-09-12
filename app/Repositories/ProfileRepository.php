<?php

namespace App\Repositories;

use Illuminate\Http\Request;

class ProfileRepository
{
    public function store(Request $request)
    {
        auth()->user()->clearMediaCollection('avatar');
        auth()->user()->addMedia($request->profile)->preservingOriginal()->toMediaCollection('avatar');
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
