@extends('layout')

@section('title','Contacts')

@section('content')

    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">Our Contacts</h1>
                <div class="row">
                    <ul>
                    @foreach($contacts as $contact)
                        <li> {{$contact->title}} : {{$contact->value}} </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

