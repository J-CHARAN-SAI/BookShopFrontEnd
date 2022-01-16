@extends('layout')

@section('content')

<br>

<div>
    {!! Form::open(['method' => 'GET' , 'action' => 'App\Http\Controllers\BookController@getBook' ]) !!}
    {{Form::text('title', '', ['placeholder' => 'Title of the book' ])}}
    {{Form::submit('Search' )}}
    {!! Form::close() !!}
</div>

<br>

@if(count($books) > 0)
<table>
    <tr>
        <th>Title</th>
        <th>Price</th>
        <th>Author first name</th>
        <th>Author last name</th>
        <th>Author email </th>
        <th>Edit Book</th>
        <th>Delete Book</th>
    </tr>
    @foreach ($books as $book)
    <tr>
        <td>{{ $book["title"] }}</td>
        <td>{{ $book["price"] }}</td>
        <td>{{ $book["firstname"]}}</td>
        <td>{{ $book["lastname"]}}</td>
        <td>{{ $book["email"]}}</td>
        <td> <a href="{{ url('/editBook/'.$book["id"] )}}" class="btn btn-primary" $book >Update</a> </td>
        <td> <a href="{{ url('/bookDetails/delete/'.$book["id"])}}" class="btn btn-danger" >Delete</a> </td>
    </tr>
    @endforeach
</table>
@else

<h2>No books Available</h2>

@endif

@if(session()->has('alert'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ Session::get('alert') }}
</div>
@endif

@endsection
