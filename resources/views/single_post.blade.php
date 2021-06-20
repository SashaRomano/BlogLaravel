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
            <div class="card-footer text-muted">
                @foreach($post->category as $category)
                    <a href="{{route('posts_by_category',$category->key)}}">{{$category->title}}</a>
                @endforeach
            </div>

            @if(Auth::check())
                <hr>
                @if(count($comments) == 0) <p>No comments yet</p>@endif
                @foreach($comments as $comment)
                    Author: <strong>{{$comment->author}}</strong><br>
                {{$comment->comment}}
                Added: {{$comment->created_at}}
                @endforeach
                <form action="save_comment" method="post">
                    @csrf
                    <h2>Add comment</h2>
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <input type="hidden" name="author" value="{{Auth::user()->name}}">
                    <textarea class="form-control" name="comment"></textarea>
                    <br>
                    <button class="btn btn-primary">Add comment</button>
                    @else
                        <p>Log in to add and see comments</p>
                </form>
            @endif


        </div>

    </div>

@endsection

