@extends('layouts/app')

@section('title')

@endsection

@section('content_header')
<h1 class="title">Blog posts</h1>
@endsection

@section('content')
<div class="container">
    <div style="margin-bottom: 5mm"><a href="/blogposts/createpost">Create post</a></div>

    @foreach ($posts as $post)
    <ul>
        <li><a href="/blogposts/posts/{{$post->id}}">{{$post->title}}</a></li>
    </ul>

    @endforeach
</div>
@endsection
