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

Route::get('/bookDetails','App\Http\Controllers\BookController@getBook');


Route::put('/editBook/{id}','App\Http\Controllers\BookController@updateBook');

Route::get('/editBook/{id}', 'App\Http\Controllers\BookController@getDataOfBook');

Route::get('/bookDetails/delete/{id}','App\Http\Controllers\BookController@deleteBook');

