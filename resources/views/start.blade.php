@extends('layout')

@section('title','Home')



@section('content')

    <div class="container">

        <h1 class="my-4">Blog
            <small>about IT</small>
        </h1>
    @foreach($post as $post)
        <!-- Blog Post -->
            <div class="card mb-4">
                <img class="card-img-top" src="{{$post->img}}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$post->post_title}}</h2>
                    <p class="card-text">{{mb_substr($post->post_text,0,200)}}...</p>
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
                <div class="card-footer text-muted">
                    <p>This post was read by {{$post->read}} users</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <ul class="pagination justify-content-center mb-4">
        @if($post->currentPage != 1)
            <li class="page-item">
                <a class="page-link" href="?page=1">&larr;&larr; First</a>
            </li>
            <li class="page-item disabled">
                <a class="page-link" href="{{$post->previousPageUrl}}">&larr;</a>
            </li>
        @endif
        @if($post->count > 1)
            @for($count = 1; $count <= $post->lastPage(); $count++)
                @if($count > $post->currentPage()-3 and $count < $post->currentPage+3)
                    <li class="page-item @if($count == $post->currentPage()) active @endif">
                        <a href="?page={{$count}}"></a>
                    </li>
                @endif
            @endfor
        @endif
        @if($post->currentPage != $post->lastPage)
            <li>
                <a href="{{$post->nextPageUrl()}}">&rarr;</a>
            </li>
            <li>
                <a href="?page={{$post->lastPage()}}">Last &rarr;&rarr;</a>
            </li>
        @endif
    </ul>

@endsection

