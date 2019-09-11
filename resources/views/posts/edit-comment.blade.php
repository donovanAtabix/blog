@extends('layouts/app')

@section('title')
Edit comment
@endsection

@section('content_header')
<h1>Edit Post comment</h1>
@endsection

@section('content')
<div class="container">
    <form method="POST" action="/blog/posts/{{$post->id}}/comments/{{$comment->id}}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div>
            <label class="lable" for="description">Update comment</label>
        </div>

        <div>
            <textarea class="form-control" name="description" placeholder="Update your comment"
            style="" required>{{old('description', $comment->description)}}</textarea>

            <div>
                <button class="button is-link" type="submit" style="margin-top: 5mm">
                    Update
                </button>
            </form>

            <form method="POST" action="/blog/posts/{{$post->id}}/comments/{{$comment->id}}">
                {{ method_field('DELETE')}}
                {{ csrf_field() }}

                <div>
                    <button class="button is-link" type="submit"
                    style="margin-top: 2mm" >Delete Comment</button>
                </div>

            </form>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        </div>
        @endsection
