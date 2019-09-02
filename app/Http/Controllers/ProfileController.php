<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DisplayName;
use Spatie\MediaLibrary\Models\Media;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //
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
        //dd($displayName);
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
