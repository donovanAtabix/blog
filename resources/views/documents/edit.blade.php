@extends('layouts/app')

@section('title')

@endsection

@section('content_header')
<h1 class="title">Blog posts</h1>
@endsection

@section('content')
<div class="container">
    <form action="{{route('documents.destroy', $document)}}" method="POST"  >
        @csrf
        @method('DELETE')
            <div class="delete-position">
                <button type="submit" class="button-delete">Delete {{$document->name}}</button>
            </div>
    </form>

    <div>
        <form action="{{route('documents.update', $document)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <hr>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <hr>
                <br>
            @endif

            <table style="width:60%">
                <tr>
                    <th>Edit Image </th>
                    <th>Document Name</th>
                    <th>File upload</th>
                    <th></th>
                </tr>
                <tr>
                    <td style="vertical-align:bottom">
                        @if($document->getFirstMedia('documents')->mime_type === 'application/pdf')
                            <i class="fa fa-file-pdf-o fa-3x" aria-hidden="true"></i>
                            @else
                            <img src="{{$document->getFirstMediaUrl('documents')}}" alt="{{$document->name}}" width="40" height="40">
                            @endif
                        </td>
                    <td style="vertical-align:bottom"><input type="text" id="name" name="name" value="{{$document->name}}"></td>
                    <td style="vertical-align:bottom"><input type="file" id="document" name="document"></td>
                    <td style="vertical-align:bottom"><button type="submit">Edit {{$document->name}}</button></td>
                </tr>
            </table>
            <br>
            <hr>
        </form>
    </div>

</div>
@endsection

