<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $profile;

    public function __construct(UserRepository $profile)
    {
        $this->profile = $profile;
    }

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
        $this->profile->store($request);

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $this->profile->update($user, $request->all());

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
        $this->profile->destroy();
        $this->profile->avatarImage();

        return redirect()->back();
    }
}
