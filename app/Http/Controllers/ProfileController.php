<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $switch_display_name = $user->switch_display_name;
        $firstName = $user->name;
        $avatarName = $user->avatar_name;
        $media = $user->getFirstMediaUrl('avatar');
        $thumb = $user->getFirstMediaUrl('avatar', 'thumb');

        return view('profile', [
            'profile' => $user->id,
            'media' => $media,
            'thumb' => $thumb,
            'switch_display_name' => $switch_display_name,
            'firstName' => $firstName,
            'avatarName' => $avatarName,
        ]);
    }

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

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        auth()->user()->clearMediaCollection('avatar');

        return redirect()->back();
    }
}
