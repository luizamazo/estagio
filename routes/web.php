<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@index')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::resource('logs', 'LogController');
Route::resource('aluno', 'AlunoController');
Route::resource('coordenador', 'CoordenadorController');
Route::resource('supervisor', 'SupervisorController');
Route::resource('instituicao', 'InstituicaoController');
Route::resource('curso', 'CursoController')->except(['show', 'update', 'edit']);
Route::resource('empresa', 'EmpresaController');

Route::get('/inter', 'InterController@create');
Route::post('/inter', 'InterController@link');
Route::get('/inter/campus', 'InterController@campus');
Route::post('/inter/campus', 'InterController@store');


/*Route::prefix('/listar')->group(function() {
    
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('alunos', 'AlunoController@index')->name('alunos');
 
    
    
});

Route::prefix('cadastrar')->group(function(){
    Route::get('/aluno', 'AlunoController@create')->name('cadastro.aluno.form');
    Route::post('/aluno', 'AlunoController@store')->name('cadastro.aluno.submit');

});
*/









