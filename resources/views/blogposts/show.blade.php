@extends('layouts/app')

@section('title')
Blog post
@endsection

@section('content')

<div class="container">
    <h1 class="title"></h1>
    <h1 class="title"><img src="{{$postUserThumb}}" alt="Avatar" class="rounded-circle"> 
    {{$postUserName}} post: {{$post->title}} </h1>
</div>

<div class="container">
    @if (auth()->user()->id === $post->user_id)
    <div>
        <h3><a href="/blogposts/posts/{{$post->id}}/edit">Edit Post</a></h3>
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
                @foreach ($users as $user)
                    @foreach($user->comments as $comment)
                        @if($comment->post_id === $post->id)
                            <ul style="margin-inline-start: 10mm">
                                <ul>
                                    <img src="{{$user->getFirstMediaUrl('avatar', 'thumb')}}" alt="Avatar" class="rounded-circle">
                                     {{$user->display_name}} comment: {{$comment->description}}
                                    @can('update', $comment)
                                        <a href="/blogposts/comments/{{$comment->id}}"><h5>edit</h5></a>
                                    @endcan

                                    @can ('delete', $comment)
                                        <form method="POST" action="/blogposts/comments/{{$comment->id}}">
                                            {{method_field('DELETE')}}
                                            {{ csrf_field() }}

                                            <button class="button is-link" type="submit" style="">
                                                Delete comment
                                            </button>
                                        </form>
                                    @endcan
                                </ul>
                            </ul>
                        @endif
                    @endforeach
                @endforeach
        </div>
    </div>


    <form class="box" method="POST" action="/blogposts/{{$post->id}}/show">
        {{ csrf_field() }}
        <div>
            <label class="label" for="comment">Add Comment</label>
        </div>

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
