@extends('layout')

@section('title')

@endsection

@section('content_header')
    <h1 class="title">Blog posts</h1>
@endsection

@section('body')

<div style="margin-bottom: 5mm"><a href="/blogposts/createpost">Create post</a></div>

@foreach ($posts as $post)
    <ul>
        <li><a href="/blogposts/{{$post->id}}/show">{{$post->title}}</a></li>
    </ul>

@endforeach

@endsection
