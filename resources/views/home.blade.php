@extends('layout')

@section('title','Home')



@section('content')

    <div class="container">

        <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
        </h1>
@foreach($new_post as $new_post)
        <!-- Blog Post -->
        <div class="card mb-4">
            <img class="card-img-top" src="{{$new_post->img}}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">{{$new_post->post_title}}</h2>
                <p class="card-text">{{mb_substr($new_post->post_text,0,200)}}...</p>
                <a href="{{route('single_post', $new_post->id)}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Posted on {{$new_post->created_at}} by
                <a href="{{route('posts_by_author', $new_post->author->key)}}">{{$new_post->author->name}}</a>
            </div>



        </div>
    @endforeach
    </div>

@endsection

