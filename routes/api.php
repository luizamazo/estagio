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
/////////////////////////////////////////////////
Route::get('/logs', [
    'uses' => 'LogController@index',
    'middleware' => 'jwt.auth'
]);
Route::delete('/logs', [
    'uses' => 'LogController@destroy',
    'middleware' => 'jwt.auth'
]);
/////////////////////////////////////////////////
Route::resource('/instituicao', 'InstituicaoController', [
    'middleware' => 'jwt.auth'
]);

Route::post('/instituicao/campus', 'InstituicaoController@storeCampus', [
    'middleware' => 'jwt.auth'
]);
Route::resource('/curso', 'CursoController', [
    'middleware' => 'jwt.auth'
]);
/////////////////////////////////////////////////
Route::resource('/empresa', 'EmpresaController', [
    'middleware' => 'jwt.auth'
]);
/////////////////////////////////////////////////
Route::resource('/coordenador', 'CoordenadorController', [
    'middleware' => 'jwt.auth'
]);
Route::resource('/supervisor', 'SupervisorController', [
    'middleware' => 'jwt.auth'
]);
Route::resource('/aluno', 'AlunoController', [
    'middleware' => 'jwt.auth'
]);
/////////////////////////////////////////////////
Route::resource('/vaga', 'VagaController', [
    'middleware' => 'jwt.auth'
]);
Route::post('/solicitacao/{id}', 'SolicitacaoController@store', [
    'middleware' => 'jwt.auth'
]);
Route::get('/solicitacao/{id}', 'SolicitacaoController@show', [
    'middleware' => 'jwt.auth'
]);
Route::get('/solicitacao/aluno/{id}', 'SolicitacaoController@showAluno', [
    'middleware' => 'jwt.auth'
]);
Route::post('/solicitacao/fb/{id}', 'SolicitacaoController@update',[
    'middleware' => 'jwt.auth'
]);
///////////////////////////////////////////////
Route::post('/estagio/{id}', 'EstagioController@store', [
    'middleware' => 'jwt.auth'
]);
Route::get('/estagio/{id}', 'EstagioController@show', [
    'middleware' => 'jwt.auth'
]);


