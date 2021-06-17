@extends('layout')

@section('title','Post № '.$post->id)

@section('content')

    <div class="container">

        <h1 class="my-4">{{$post->post_title}}</h1>

        <!-- Blog Post -->
        <div class="card mb-4">
            <img class="card-img-top" src="{{$post->img}}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">{{$post->post_text}}</p>

            </div>
            <div class="card-footer text-muted">
                Posted on {{$post->created_at}} by {{$post->author->name}}
                <br>
                <a href="{{route('posts_by_author', $post->author->key)}}">{{$post->author->name}}</a>
            </div>


        </div>

    </div>

@endsection

