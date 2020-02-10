@extends('layouts/app')

@section('title')
Profile
@endsection

@section('content')
<div class="container">
    <div style="margin-left: 21mm">
        Profile

        <div style="margin-bottom: 5mm">
            <form method="POST" action="/users/{{$user->switch_display_name}}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div>
                    <select name="display_name" class="form-control" id="select">
                        <option value="0"
                        @if($user->switch_display_name == 0)
                        selected='selected'
                        @endif
                        >{{$user->avatar_name}}</option>
                        <option value="1"
                         @if($user->switch_display_name == 1)
                        selected='selected'
                        @endif
                        >{{$user->name}}</option>
                    </select>
                    </div>

                    <div>
                        <button type="submit" class="button is-link">update display name</button>
                    </div>
                </form>
            </div>

            @if (session()->has('error'))
            <div class="alert alert-danger" style="margin-top: 2mm">
                {{session()->get('error')}}
            </div>
            @endif
            <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data" style="margin-top: 2mm">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" value="" name="profile" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01" required>
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                    <input type="submit" value="Upload" class="btn btn-success" style="margin-left: 5mm">
                </div>
            </form>

            <div class="card-columns">
                <div class="card">
                    <img src="{{$user->getFirstMediaUrl('avatar')}}" alt="Avatar">
                    <div class="card-body">
                        <h5 class="card-title">Card title that wraps to a new line</h5>
                        <p class="card-text">
                            This is a longer card with supporting text below as a natural lead-in
                            to additional content. This content is a little bit longer.</p>
                        </div>

                        <div>
                            <form action="/users/{{$user->id}}" method="POST">
                                {{ csrf_field() }}
                                {{method_field("DELETE")}}
                                <div>
                                    <button class="button-delete">Delete Avatar image</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
</div>

            @endsection
