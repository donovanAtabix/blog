@extends('layouts/app')

@section('title')

@endsection

@section('content_header')
<h1 class="title">Blog posts</h1>
@endsection

@section('content')
<div class="container">

    <div>
        <form action="{{route('documents.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <th>Name Document </th>
                    <th>File upload</th>
                    <th></th>
                </tr>
                <tr>
                    <td><input type="text" id="name" name="name"></td>
                    <td><input type="file" id="document" name="document"></td>
                    <td><button type="submit">save</button></td>
                </tr>
            </table>
        </form>
    </div>

</div>
@endsection

