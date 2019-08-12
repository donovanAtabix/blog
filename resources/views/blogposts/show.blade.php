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
        <h3><a href="/blogposts/{{$post->id}}/edit">Edit Post</a></h3>
    </div>

    <div>
        <h3></h3>
    </div>

    <div>
        <ul>
            <li><h3>{{$post->post}}</h3></li>
        </ul>
        <div style="margin-bottom: 5mm">
            @foreach ($post->comments as $comment)
                <li><a href="">{{$comment->comment}}</a></li>
            @endforeach
        </div>
    </div>


        <form class="box" method="POST" action="/blogposts/{{$post->id}}/show">
            {{ csrf_field() }}
            <div>
                <label class="label" for="comment">Add Comment</label>
            </div>

            <div>
                <textarea class="textarea" name="comment"
                placeholder="Comment" required>{{old('comment')}}</textarea>
            </div>

            <div>
                <button class="button is-link" type="submit">Submit comment</button>
            </div>
        </form>


@endsection
