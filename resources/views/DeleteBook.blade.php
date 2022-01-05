
@extends('layout')

@section('content')



<h1>Delete Book</h1>

<div>
    {!! Form::open(['method' => 'DELETE' , 'action' => 'App\Http\Controllers\BookController@deleteBook' ]) !!}

    <div>
        {{Form::label('id', 'Id')}}
        <br>
        {{Form::text('id', '', ['placeholder' => 'Id'])}}
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
