@extends('layout')

@section('title',$category->title)



@section('content')

    <div class="container">

        <h1 class="my-4">All posts by category
            <small>{{$category->title}}</small>
        </h1>
    @foreach($category->post as $post)
        <!-- Blog Post -->
            <div class="card mb-4">
                <img class="card-img-top" src="{{$post->img}}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$post->post_title}}</h2>
                    <p class="card-text">{{$post->post_text}}</p>
                    <a href="#" class="btn btn-primary">Read More &rarr;</a>
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


