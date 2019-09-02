<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class ProfileController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        auth()->user()->clearMediaCollection('avatar');
        auth()->user()->addMedia($request->profile)->preservingOriginal()->toMediaCollection('avatar');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        auth()->user()->clearMediaCollection('avatar');

        return back();
    }

    public function profile(User $profile)
    {
        $select = auth()->user()->select;
        $firstName = auth()->user()->name;
        $avatarName = auth()->user()->avatar_name;
        $media = auth()->user()->getFirstMediaUrl('avatar');
        $thumb = auth()->user()->getFirstMediaUrl('avatar', 'thumb');

        return view('profile', [
            'profile' => $profile,
            'media' => $media,
            'thumb' => $thumb,
            'select' => $select,
            'firstName' => $firstName,
            'avatarName' => $avatarName,
        ]);
    }
}
