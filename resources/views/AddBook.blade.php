
@extends('layout')

@section('content')



<h1>Add Book</h1>

<div>
    {!! Form::open(['method' => 'POST' , 'action' => 'App\Http\Controllers\BookController@addBook' ]) !!}

    <div>
        {{Form::label('title', 'Title')}}
        <br>
        {{Form::text('title', '', ['placeholder' => 'Title'])}}
    </div>

    <div>
        {{Form::label('price', 'Price')}}
        <br>
        {{Form::text('price', '', ['placeholder' => 'Price'])}}
    </div>

    <div>
        {{Form::label('author[first_name]', 'Author first name')}}
        <br>
        {{Form::text('author[first_name]', '', ['placeholder' => 'Author first name','value'=>'first_name'])}}
    </div>

    <div>
        {{Form::label('author[last_name]', 'Author last name')}}
        <br>
        {{Form::text('author[last_name]', '', ['placeholder' => 'Author last name','value'=>'last_name'])}}
    </div>

    <div>
        {{Form::label('author[email]' , 'Email')}}
        <br>
        {{Form::text('author[email]', '', ['placeholder' => 'Email','value'=>'email'])}}
    </div>
    <div>
        {{Form::submit('Submit' )}}
    </div>
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>
</div>


{!! Form::close() !!}
@endsection
