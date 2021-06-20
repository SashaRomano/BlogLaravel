@extends('layout')

@section('title','Add post')

@section('content')




    <h1>Add post</h1>

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
        <form action="add_post" method="post" enctype="multipart/form-data">
            @csrf
            <strong>Choose author : </strong>
            <select name="author_id">
                @foreach($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select>

        <hr>
        <strong>Choose category : </strong>
        @foreach($categories as $category)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{$category->id}}">
                <label class="form-check-label" for="flexCheckDefault">{{$category->title}}</label>
            </div>
        @endforeach
        <hr>
        <strong>Enter title : </strong>
        <input type="text" name="post_title"><br>
        <hr>
        <strong>Enter post text : </strong>
        <textarea class="form-control" name="post_text"></textarea><br>
        <hr>
        <strong>Add image : </strong>
        <input type="file" name="img"><br>
        <hr>
        <button class="btn btn-primary btn-save btn-cm">Add post</button>
        </form>
    @endif


@endsection
