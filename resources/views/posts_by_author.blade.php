@extends('layout')

@section('title',$author->name)



@section('content')

    <div class="container">

        <h1 class="my-4">All posts by
            <small>{{$author->name}}</small>
        </h1>
    @foreach($author->posts as $post)
        <!-- Blog Post -->
            <div class="card mb-4">
                <img class="card-img-top" src="{{$post->img}}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$post->post_title}}</h2>
                    <p class="card-text">{{$post->post_text}}</p>
                    <a href="{{route('single_post', $post->id)}}" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on {{$post->created_at}} by
                    <a href="{{route('posts_by_author', $post->author->key)}}">{{$post->author->name}}</a>
                </div>
                <div class="card-footer text-muted">
                    @foreach($post->category as $cat)
                        <a href="{{route('posts_by_category',$cat->key)}}">{{$cat->title}}</a>
                    @endforeach
                </div>


            </div>
        @endforeach
    </div>

@endsection

