@extends('layout')

@section('title')
    Blog post
@endsection

@section('content_header')
    <div>
        <h1 class="title"></h1>
        <h1 class="title">{Add avatar name} {{$post->title}} post</h1>
    </div>
@endsection

@section('body')

    <div>
        <h3><a href="">Edit Post</a></h3>
    </div>

    <div>
        <ul>
            <li><h3>{{$post->post}}</h3></li>
        </ul>
    </div>


        <form class="box" method="POST" action="/blogpost/{{$post->id}}/show">
            <div>
                <label class="label" for="comment">Add Comment</label>
            </div>

            <div>
                <textarea class="textarea" name="comment"
                placeholder="Comment">{{old('comment')}}</textarea>
            </div>

            <div>
                <button class="button is-link" type="submit">Submit comment</button>
            </div>
        </form>


@endsection
