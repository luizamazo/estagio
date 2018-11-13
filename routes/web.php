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

Route::prefix('/listar')->group(function() {
    
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('alunos', 'AlunoController@index')->name('alunos');
    Route::get('coordenadores', 'CoordenadorController@index')->name('coordenadores');
    Route::get('supervisores', 'SupervisorController@index')->name('supervisores');
    Route::get('empresas', 'EmpresaController@index')->name('empresas');
    Route::get('instituicoes', 'InstituicaoController@index')->name('instituicoes');
    Route::get('cursos', 'CursoController@index')->name('cursos');
    Route::get('logs', 'LogController@index')->name('logs');
    Route::get('vagas', 'VagaController@index')->name('vagas');
    
    
});

Route::prefix('cadastrar')->group(function(){
    Route::get('/aluno', 'AlunoController@create')->name('cadastro.aluno.form');
    Route::post('/aluno', 'AlunoController@store')->name('cadastro.aluno.submit');

    Route::get('/coordenador', 'CoordenadorController@create')->name('cadastro.coordenador.form');
    Route::post('/coordenador', 'CoordenadorController@store')->name('cadastro.coordenador.submit');

    Route::get('/supervisor', 'SupervisorController@create')->name('cadastro.supervisor.form');
    Route::post('/supervisor', 'SupervisorController@store')->name('cadastro.supervisor.submit');

    Route::get('/empresa', 'EmpresaController@create')->name('cadastro.empresa.form');
    Route::post('/empresa', 'EmpresaController@store')->name('cadastro.empresa.submit');

    Route::get('/instituicao', 'InstituicaoController@create')->name('cadastro.instituicao.form');
    Route::post('/instituicao', 'InstituicaoController@store')->name('cadastro.instituicao.submit');

    Route::get('/curso', 'CursoController@create')->name('cadastro.curso.form');
    Route::post('/curso', 'CursoController@store')->name('cadastro.curso.submit');

    Route::get('/vaga', 'VagaController@create')->name('cadastro.vaga.form');
    Route::post('/vaga', 'VagaController@store')->name('cadastro.vaga.submit');
});



Route::prefix('editar')->group(function(){
    Route::get('/aluno/{id}', 'AlunoController@edit')->name('editar.aluno.form');
    Route::put('/aluno/{id}', 'AlunoController@update')->name('editar.aluno.submit');

    Route::get('/coordenador/{id}', 'CoordenadorController@edit')->name('editar.coordenador.form');
    Route::put('/coordenador/{id}', 'CoordenadorController@update')->name('editar.coordenador.submit');

    
    Route::get('/supervisor/{id}', 'SupervisorController@edit')->name('editar.supervisor.form');
    Route::put('/supervisor/{id}', 'SupervisorController@update')->name('editar.supervisor.submit');

    Route::get('/empresa/{id}', 'EmpresaController@edit')->name('editar.empresa.form');
    Route::put('/empresa/{id}', 'EmpresaController@update')->name('editar.empresa.submit');

    
    Route::get('/instituicao/{id}', 'InstituicaoController@edit')->name('editar.instituicao.form');
    Route::put('/instituicao/{id}', 'InstituicaoController@update')->name('editar.instituicao.submit');

    Route::get('/curso/{id}', 'CursoController@edit')->name('editar.curso.form');
    Route::put('/curso/{id}', 'CursoController@update')->name('editar.curso.submit');

    Route::get('/vaga/{id}', 'VagaController@edit')->name('editar.vaga.form');
    Route::put('/vaga/{id}', 'VagaController@update')->name('editar.vaga.submit');
});


Route::prefix('mostrar')->group(function(){
    Route::get('/aluno/{id}', 'AlunoController@show')->name('mostrar.aluno');
    Route::get('/coordenador/{id}', 'CoordenadorController@show')->name('mostrar.coordenador');
    Route::get('/supervisor/{id}', 'SupervisorController@show')->name('mostrar.supervisor');
    Route::get('/instituicao/{id}', 'InstituicaoController@show')->name('mostrar.instituicao');
    Route::get('/vaga/{id}', 'VagaController@show')->name('mostrar.vaga');
});

Route::prefix('deletar')->group(function(){
    Route::delete('/aluno/{id}', 'AlunoController@destroy');
    Route::delete('/coordenador/{id}', 'CoordenadorController@destroy');
    Route::delete('/supervisor/{id}', 'SupervisorController@destroy');
    Route::delete('/empresa/{id}', 'EmpresaController@destroy');
    Route::delete('/instituicao/{id}', 'InstituicaoController@destroy');
    Route::delete('/curso/{id}', 'CursoController@destroy');
    Route::delete('/vaga/{id}', 'VagaController@destroy');
});

Route::prefix('solicitar')->group(function(){
    Route::get('v{{$vag->id}}/{id}', 'SolicitacaoController@create');
});



    
   
  
































