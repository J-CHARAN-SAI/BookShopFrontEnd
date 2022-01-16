@extends('layout')

@section('content')

<h1>Edit Book</h1>

    <div>
        {!! Form::open(['method' => 'PUT' , 'action' => 'App\Http\Controllers\BookController@updateBook' , 'url' => '/editBook/'.$book["id"]]) !!}

        <div>
            {{Form::label('title', 'Title')}}
            <br>
            {{Form::text('title', $book["title"] , ['placeholder' => 'Title'])}}
        </div>

        <div>
            {{Form::label('price', 'Price')}}
            <br>
            {{Form::text('price', $book["price"] , ['placeholder' => 'Price'])}}
        </div>

        <div>
            {{Form::submit('Submit' )}}
        </div>
        {!! Form::close() !!}
    </div>


@if(session()->has('alert'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ Session::get('alert') }}
</div>
@endif

@endsection
