@extends('layout')

@section('title','Cart')

@section('content')

    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">Your cart</h1>
                <table class="table tab-content">
                    <tr>
                        <th>ID</th>
                        <th>Preview</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sum</th>
                        <th>Delete</th>
                    </tr>
                    @if(!Cart::isEmpty())
                        @foreach(\Cart::getContent() as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>
                                    <img src="{{$post->attributes->image}}" width="75px">
                                </td>
                                <td>{{$post->name}}</td>
                                <td>{{$post->price}}</td>
                                <td>{{$post->quantity}}</td>
                                <td>{{$post->getPriceSum()}}</td>
                                <td>
                                    <a href="{{route('delete_from_cart', $post->id)}}" class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </table>


            </div>
        </div>
    </div>

@endsection
