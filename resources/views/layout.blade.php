<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/blog-home.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('start')}}">Super Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('start')}}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('ab')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('serv')}}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cont')}}">Contact</a>
                </li>
                @if(\Illuminate\Support\Facades\Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('delete_post_get')}}">Administrate posts</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link"
                       href="{{route('home')}}">@if(\Illuminate\Support\Facades\Auth::check())
                            {{\Illuminate\Support\Facades\Auth::user()->name}}
                        @else
                            Log in
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            @yield('content')

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Currency</h5>
                <div class="card-body">
                    <ul class="">
                        @inject('currency','\App\Currency')
                        {{$currency->get_currency()}}
                    </ul>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                @inject('categories', '\App\Category')
                                @foreach($categories->show_categories() as $category)
                                    <li>
                                        <a href="{{route('posts_by_category',$category->key)}}">{{$category->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-6">

                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Recommended Post</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            @inject('post', '\App\Post')
                            @foreach($post->show_random_post() as $post)
                                <a href="{{route('single_post', $post->id)}}">Post
                                    № {{$post->id}}  {{$post->post_title}}</a>
                            @endforeach
                        </div>
                        <div class="col-lg-6">

                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Nets</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                @inject('nets', '\App\Net')
                                @foreach($nets->show_nets() as $net)
                                    <li>
                                        <a href="{{$net->url}}">{{$net->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-6">

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

