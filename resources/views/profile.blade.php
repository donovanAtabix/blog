@extends('layouts/app')

@section('content')
<div style="margin-left: 21mm">
    Profile
</div>

<div class="container">
    @if (session()->has('error'))
        <div class="alert alert-danger" style="margin-top: 2mm">
            {{session()->get('error')}}
        </div>
    @endif
    <form action="/profile" method="POST" enctype="multipart/form-data" style="margin-top: 2mm">
        {{ csrf_field() }}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" name="profile" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
            <input type="submit" value="Upload" class="btn btn-success" style="margin-left: 5mm">
        </div>
    </form>

</div>

<div class="input-group-prepend" style="margin-left: 23mm">
    <div class="card-columns">
            <div class="card">
                <img src="{{$media}}" alt="Avatar">
                <div class="card-body">
                    <h5 class="card-title">Card title that wraps to a new line</h5>
                    <p class="card-text">
                        This is a longer card with supporting text below as a natural lead-in
                        to additional content. This content is a little bit longer.</p>
                </div>

            <div>
                <form action="/profile/{{$profile}}" method="POST">
                    {{ csrf_field() }}
                    {{method_field("DELETE")}}
                    <div>
                        <button class="button is-link">Delete Avatar image</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @endsection
