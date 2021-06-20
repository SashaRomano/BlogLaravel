@extends('layout')

@section('title','Admin')

@section('content')

    <div class="container">

        <h1 class="my-4">Administrate posts</h1>

        <a href="{{route('add_post_get')}}" class="btn btn-primary btn-outline-success">Add post</a>
        <hr>
        <!-- Blog Post -->
        <div class="card mb-4">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">TITLE</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td scope="row">{{$post->id}}</td>
                        <td>{{$post->post_title}}</td>
                        <td>
                            <form action="/admin/edit_post/{{$post->id}}" method="get">
                                <input type="hidden" name="id" value="{{$post->id}}">
                                <button type="submit" class="btn btn-primary btn-outline-danger">Edit post</button>
                            </form>
                        </td>
                        <td>
                            <form action="" method="post">
                                @csrf
                                {{method_field('delete')}}
                                <input type="hidden" name="id" value="{{$post->id}}">
                                <button type="submit" class="btn btn-primary btn-danger">Delete post</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

@endsection
