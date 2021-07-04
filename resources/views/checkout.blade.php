@extends('layout')

@section('title','Order')

@section('content')

    <!-- Blog Entries Column -->


    <h1 class="my-4">Please enter your data</h1>

    <form id="checkout" method="post" action="{{route('checkout')}}">
        @csrf
        @if(count($errors)>0)
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input class="form-control" name="first_name" placeholder="Enter your first name">
        <br>
        <input class="form-control" name="last_name" placeholder="Enter your last name">
        <br>
        <input class="form-control" name="email" placeholder="Enter your email">
        <br>
        <input class="form-control" name="phone" placeholder="Enter your phone">
        <br>
        <input class="form-control" name="adress" placeholder="Enter your adress">
        <br>
        <input class="form-control" name="notes" placeholder="Enter notes for your order">
        <hr>
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
        <input type="submit" value="Order" class="btn btn-outline-success btn-block">
        <br>
    </form>



@endsection
