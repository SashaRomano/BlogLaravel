@extends('layout')

@section('title','Cart')

@section('content')

    <!-- Blog Entries Column -->


    <h1 class="my-4">Your cart</h1>
    <form id="checkout" method="post" action="{{route('update_cart')}}">
        @csrf
        <table class="table tab-content">
            @if(!Cart::isEmpty())
                <tr>
                    <th>ID</th>
                    <th>Preview</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sum</th>
                    <th>Delete</th>
                </tr>
                @foreach(\Cart::getContent() as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>
                            <img src="{{$post->attributes->image}}" width="75px">
                        </td>
                        <td>{{$post->name}}</td>
                        <td>{{$post->price}}</td>
                        <td>
                            <input type="number" name="items[{{$post->id}}]" value="{{$post->quantity}}">
                        </td>
                        <td>{{$post->getPriceSum()}}</td>
                        <td>
                            <a href="{{route('delete_from_cart', $post->id)}}" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{\Cart::getTotalQuantity()}}</td>
                    <td>{{\Cart::getTotal()}}</td>
                    <td></td>
                </tr>

        </table>
        <a class="btn btn-outline-success" href="#" onclick="document.getElementById('checkout').submit()">Update
            cart</a>
    </form>
    <hr>
    <a class="btn btn-outline-success btn-block" href="{{route('checkout')}}">To order</a>
    @else
        <p>Your cart is empty</p>
    @endif







@endsection
