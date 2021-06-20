@extends('layout')

@section('title','Edit post')

@section('content')


    <h1>Edit post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Blog Post -->


    @if(Auth::check())
        <hr>
        <form action="edit_post" method="post" enctype="multipart/form-data">
            @csrf
            <strong>Choose author : </strong>
            <select name="author_id">
                @foreach($authors as $author)
                    <option @if($author->id == $post->author_id) selected @endif value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select>

            <hr>
            <input type="hidden" name="id" value="{{$post->id}}">
            <strong>Edit title : </strong>
            <input type="text" name="post_title" value="{{$post->post_title}}"><br>
            <hr>
            <strong>Edit post text : </strong>
            <textarea class="form-control" name="post_text" value="{{$post->post_text}}"></textarea><br>
            <hr>
            <strong>Edit image : </strong>
            <input type="file" name="img"><br>
            <hr>
            <button class="btn btn-primary btn-save btn-cm">Edit post</button>
        </form>
    @endif


@endsection
