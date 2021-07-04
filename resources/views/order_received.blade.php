@extends('layout')

@section('title','Confirm')

@section('content')

    <!-- Blog Entries Column -->


    <h1 class="my-4">Please confirm your order</h1>

    <form id="checkout" method="post" action="{{route('checkout')}}">
        @csrf

        <h3 class="my-4">Your order</h3>
        <table class="table tab-content">
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Sum</th>
            </tr>
            @if(!Cart::isEmpty())
                @foreach(\Cart::getContent() as $post)
                    <tr>
                        <td>{{$post->name}}</td>
                        <td>{{$post->price}}</td>
                        <td>{{$post->quantity}}</td>
                        <td>{{$post->getPriceSum()}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td>{{\Cart::getTotalQuantity()}}</td>
                    <td>{{\Cart::getTotal()}}</td>
                </tr>
            @endif
        </table>

        <h3 class="my-4">Your contacts</h3>
        <table class="table tab-content">
            <tr>
                <th>Name</th>
                <td>{{$order->first_name}} {{$order->first_name}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$order->email}}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{$order->phone}}</td>
            </tr>
            <tr>
                <th>Adress</th>
                <td>{{$order->adress}}</td>
            </tr>
        </table>

        <input type="submit" value="Pay on-line" class="btn btn-outline-success btn-block">
        <br>
    </form>



@endsection
