<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layout');
});

Route::get('/addBook',function (){
    return view('AddBook');
});

Route::post('/addBook','App\Http\Controllers\BookController@addBook');



Route::get('/getBook',function (){
    return view('GetBook');
});



Route::get('/editBook',function (){
    return view('EditBook');
});

Route::put('/editBook','App\Http\Controllers\BookController@updateBook');



Route::get('/deleteBook',function (){
    return view('DeleteBook');
});

Route::delete('/deleteBook','App\Http\Controllers\BookController@deleteBook');

