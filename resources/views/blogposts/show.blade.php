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

    @if (auth()->user()->id === $post->owner_id)
        <div>
            <h3><a href="/blogposts/{{$post->id}}/edit">Edit Post</a></h3>
        </div>
    @endif


    <div>
        <h3></h3>
    </div>

    <div>
        <ul>
            <li><h3>{{$post->description}}</h3></li>
        </ul>
        <div>
            @foreach ($post->comments as $comment)
               <ul style="margin-inline-start: 10mm">
                   <li>
                       {{$comment->description}}
                        @can('update', $comment)
                            <a href="/blogposts/{{$comment->id}}/edit-comment"><h5>edit</h5></a>
                        @endcan

                       @can ('delete', $comment)
                            <form method="POST" action="/blogposts/{{$comment->id}}/show">
                            {{method_field('DELETE')}}
                            {{ csrf_field() }}

                            <button class="button is-link" type="submit" style="">
                                Delete comment
                            </button>
                        </form>
                       @endcan

                    </li>
                </ul>
            @endforeach
        </div>
    </div>


        <form class="box" method="POST" action="/blogposts/{{$post->id}}/show">
            {{ csrf_field() }}
            <div>
                <label class="label" for="comment">Add Comment</label>
            </div>

            <div>
                <textarea class="textarea" name="description"
                placeholder="Comment" required>{{old('description')}}</textarea>
            </div>

            <div>
                <button class="button is-link" type="submit">Submit comment</button>
            </div>
        </form>


@endsection
