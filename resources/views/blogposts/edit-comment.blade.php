@extends('layout')

@section('title')
    Edit comment
@endsection

@section('content_header')
    <h1>Edit Post comment</h1>
@endsection

@section('body')
    <form method="POST" action="/blogposts/{{$comment->id}}/edit-comment">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div>
            <label class="lable" for="description">Update comment</label>
        </div>

        <div>
            <textarea class="textarea" name="description" placeholder="Update your comment"
            style="" required>{{$comment->description}}</textarea>

        <div>
            <button class="button is-link" type="submit" style="margin-top: 5mm">
                Update
            </button>
    </form>

    <form method="POST" action="/blogposts/{{$comment->id}}/edit-comment">
    {{ method_field('DELETE')}}
    {{ csrf_field() }}

    <div>
        <button class="button is-link" type="submit"
        style="margin-top: 2mm">Delete Comment</button>
    </div>

    </form>
@endsection
