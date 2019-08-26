@extends('layouts/app')

@section('title')
    create post
@endsection

@section('content_header')
    <h1 class="title">Creat a post</h1>
@endsection

@section('content')
        <form method="POST" action="/blogposts/posts" style="margin-top: 5mm">
        {{ csrf_field()}}
        <div>
            <input class="input" type="text" name="title"
            placeholder="Blogpost title"style="margin-bottom: 5mm"
            value="{{old('title')}}">
        </div>

        <div>
            <textarea class="textarea" name="description" placeholder="Give a post"
            style="margin-bottom:5mm" required>{{old('description')}}</textarea>
        </div>

        <div>
            <button class="button is-link" type="submit" style="margin-bottom:  5mm">
                Create post
            </button>
        </div>

    </form>
@endsection
