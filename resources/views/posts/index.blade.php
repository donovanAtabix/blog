@extends('layouts/app')

@section('title')

@endsection

@section('content_header')
<h1 class="title">Blog posts</h1>
@endsection

@section('content')
<div class="container">

    @can('create', App\Post::class)
        <div style="margin-bottom: 5mm"><a href="{{route('posts.create')}}">Create post</a></div>
    @endcan

    @foreach ($posts as $post)

    <ul>
        <li><a href="/blog/posts/{{$post->id}}">{{$post->title}}</a></li>
    </ul>

    @endforeach

    <a href="{{$posts->previousPageUrl()}}"> <-page back</a>
        <a href="{{$posts->nextPageUrl()}}">next page-></a>

</div>
@endsection

