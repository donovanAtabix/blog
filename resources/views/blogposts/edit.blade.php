@extends('layout')

@section('title')
    Edit {{$post->title}} Post
@endsection

@section('content_header')
    <h1 class="title">Edit {{$post->title}} Post</h1>
@endsection

@section('body')

    <form method="POST" action="/blogposts/posts/{{$post->id}}" style="margin-top:5mm">
        {{method_field('PATCH')}}
        {{ csrf_field() }}
        <div>
            <label class="label" for="title">Title</label>
        </div>
        <div>
            <input class="input" type="text" name="title"
            placeholder="Blogpost title"style="margin-bottom: 5mm"
            value="{{$post->title}}">
        </div>

        <div>
            <label class="label" for="description" style="margin-top: ">Post description</label>
        </div>

        <div>
            <textarea class="textarea" name="description" placeholder="Give a post"
            style="margin-top:2mm" required>{{$post->description}}</textarea>
        </div>

        <div>
            <button class="button is-link" type="submit" style="margin-top:  5mm">
               Update post
            </button>
        </div>
    </form>

    <form method="POST" action="/blogposts/posts/{{$post->id}}">
        {{method_field('DELETE')}}
        {{ csrf_field() }}
        <div>
            <button class="button is-link" type="submit" style="">Delete Post</button>
        </div>
    </form>

@endsection
