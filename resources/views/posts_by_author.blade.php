@extends('layout')

@section('title',$author->name)



@section('content')

    <div class="container">

        <h1 class="my-4">All posts by
            <small>{{$author->name}}</small>
        </h1>
    @foreach($author->new_posts as $new_post)
        <!-- Blog Post -->
            <div class="card mb-4">
                <img class="card-img-top" src="{{$new_post->img}}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$new_post->post_title}}</h2>
                    <p class="card-text">{{$new_post->post_text}}</p>
                    <a href="#" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on {{$new_post->created_at}}
                </div>



            </div>
        @endforeach
    </div>

@endsection

