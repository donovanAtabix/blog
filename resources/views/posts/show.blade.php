@extends('layouts/app')

@section('title')
Blog post
@endsection

@section('content')

<div class="container">
    <h1 class="title"></h1>
    <h1 class="title"><img src="{{$post->user->getFirstMediaUrl('avatar', 'thumb')}}" alt="Avatar" class="rounded-circle">
    {{$post->user->display_name}} post: {{$post->title}} </h1>
</div>

<div class="container">
    @can ('update', $post)
    <div>
        <h3><a href="/blog/posts/{{$post->id}}/edit">Edit Post</a></h3>
    </div>
    @endcan


    <div>
        <h3></h3>
    </div>

    <div>
        <ul>
            <li><h3>{{$post->description}}</h3></li>
        </ul>
            <div>
                @foreach($post->comments as $comment)
                            <ul style="margin-inline-start: 10mm">
                                <ul>
                                    <img src="{{$comment->user->getFirstMediaUrl('avatar', 'thumb')}}" alt="Avatar" class="rounded-circle">
                                     {{$comment->user->display_name}} comment: {{$comment->description}}
                                    @can('update', $comment)
                                        <a href="/blog/posts/{{$post->id}}/comments/{{$comment->id}}"><h5>edit</h5></a>
                                    @endcan

                                    @can ('delete', $comment)
                                        <form method="POST" action="/blog/posts/{{$post->id}}/comments/{{$comment->id}}">
                                            {{method_field('DELETE')}}
                                            {{ csrf_field() }}
                                            <div style="margin-bottom: 2mm">
                                                <button class="button is-link" type="submit" style="">
                                                    Delete comment
                                                </button>
                                            </div>
                                        </form>
                                    @endcan
                                </ul>
                            </ul>
                @endforeach
        </div>
    </div>


    <form class="box" method="POST" action="/blog/{{$post->id}}/show">
        {{ csrf_field() }}
        <div>
            <label class="label" for="comment">Add Comment</label>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div style="margin-bottom: 5mm">
            <textarea class="form-control" name="description"
            placeholder="Comment" rows="5" required>{{old('description')}}</textarea>
        </div>

        <div>
            <button class="button is-link" type="submit">Submit comment</button>
        </div>
    </form>

</div>
@endsection
