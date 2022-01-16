@extends('layout')
<script>
    let msg = '{{Session::get('alert')}}';
    let exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);
    }
</script>
@section('content')

<h1>Search Book</h1>

{!! Form::open(['method' => 'GET' , 'action' => 'App\Http\Controllers\BookController@getBook' ]) !!}
        {{Form::text('title', '', ['placeholder' => 'Title of the book' ])}}
        {{Form::submit('Search' )}}
{!! Form::close() !!}

@endsection

