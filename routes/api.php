<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Auth::routes(); 

//criar uma nova quote
Route::post('/quote', [
    'uses' => 'QuoteController@postQuote',
    'middleware' => 'jwt.auth'
]);

//get quotes
Route::get('/quotes', [
    'uses' => 'QuoteController@getQuotes'
]);

//update quote
Route::put('/quote/{id}', [
    'uses' => 'QuoteController@putQuote',
    'middleware' => 'jwt.auth'
]);

Route::delete('/quote/{id}', [
    'uses' => 'QuoteController@deleteQuote',
    'middleware' => 'jwt.auth'
]);

/////////////////////////////////////////////////

Route::post('/user', [
    'uses' => 'UserController@register'
]);

Route::post('/user/login', [
    'uses' => 'UserController@login'
]);

Route::post('/user/logout', [
    'uses' => 'UserController@logout',
    'middleware' => 'jwt.auth'
]);

Route::get('/user/dashboard', [
    'middleware' => 'jwt.auth'
]);

Route::get('/logs', [
    'uses' => 'LogController@index',
    'middleware' => 'jwt.auth'
]);

Route::delete('/logs', [
    'uses' => 'LogController@destroy',
    'middleware' => 'jwt.auth'
]);

/*Route::get('/aluno/{id}', [
    'uses' => 'AlunoController@show'
]); */
Route::resource('/aluno', 'AlunoController', [
    'middleware' => 'jwt.auth'
]);