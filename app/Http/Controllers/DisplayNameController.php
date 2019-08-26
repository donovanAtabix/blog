<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DisplayName;

class DisplayNameController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
    public function update(DisplayName $displayName, Request $request)
    {
        $request->has('displayName') ? $displayName->avatarName() : $displayName->firstName();

        return back();
    }
}
