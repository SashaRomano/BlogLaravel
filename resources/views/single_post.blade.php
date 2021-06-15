@extends('layout')

@section('title',"NewPost {{new_post->id}}")

@section('content')

    <div class="container">

        <h1 class="my-4">{{$new_post->post_title}}</h1>

        <!-- Blog Post -->
        <div class="card mb-4">
            <img class="card-img-top" src="{{$new_post->img}}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">{{$new_post->post_text}}</p>

            </div>
            <div class="card-footer text-muted">
                Posted on {{$new_post->created_at}} by {{$new_post->author->name}}
                <br>
                <a href="{{route('posts_by_author', $new_post->author->key)}}">{{$new_post->author->name}}</a>
            </div>


        </div>

    </div>

@endsection

