<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
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

        return view('profile', [
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $this->profile->store($request);

        return redirect()->back();
    }

    public function update(StoreUser $request)
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
