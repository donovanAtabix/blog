@extends('layouts/app')

@section('title')

@endsection

@section('content_header')
<h1 class="title">Blog posts</h1>
@endsection

@section('content')
<div class="container">

    @if(auth()->user()->hasRole('administrator') || auth()->user()->hasRole('project-manager'))
    <div>
        <form action="{{route('documents.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
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

            <table style="width:60%" >
                <tr>
                    <th>Name Document </th>
                    <th>File</th>
                    <th></th>
                </tr>
                <tr>
                    <td><input type="text" id="name" name="name"></td>
                    <td><input type="file" id="document" name="document"></td>
                    <td><button type="submit">Create Document</button></td>
                </tr>
            </table>
        </form>
    </div>
    @endif

    <div>
        <br>
        <hr>
        <br>
    </div>
    <div>
        <table style="width:100%" class="data-table">
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Date</th>
                <th>Download</th>
                <th>Edit</th>
                <th></th>
            </tr>
                    @foreach($documents as $document)
                <tr>
                    <td style="vertical-align:bottom">
                        {{$document->name}}<br>
                    </td>
                    <td style="vertical-align:bottom">
                        @if($document->getFirstMedia('documents')->mime_type === 'application/pdf')
                            <i class="fa fa-file-pdf-o fa-3x" aria-hidden="true"></i>
                        @else
                            <img src="{{$document->getFirstMediaUrl('documents')}}" alt="{{$document->name}}" width="40" height="40">
                        @endif
                    </td>
                    <td style="vertical-align:bottom">
                        {{$document->updated_at}}<br>
                    </td>
                    <td style="vertical-align:bottom">
                        <a href=""><i class="fa fa-download fa-2x" aria-hidden="true"></i></a>
                    </td>
                    @can('edit', $document)
                        <td style="vertical-align:bottom">
                            <a href="{{route('documents.edit', $document)}}"><i class="fa fa-pencil-square fa-2x" aria-hidden="true" style="color: black"></i></a>
                            <br>
                        </td>
                    @endcan
                </tr>
                    @endforeach
        </table>
        <br>
        <hr>
    </div>

</div>
@endsection

