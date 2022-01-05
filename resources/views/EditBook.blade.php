

@extends('layout')

@section('content')



<h1>Edit Book</h1>

    <div>
        {!! Form::open(['method' => 'PUT' , 'action' => 'App\Http\Controllers\BookController@updateBook' ]) !!}

        <div>
            {{Form::label('id', 'Id')}}
            <br>
            {{Form::text('id', '', ['placeholder' => 'Id'])}}
        </div>

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
