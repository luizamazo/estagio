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

Route::get('/alunos', 'AlunoController@index')->name('alunos');
Route::get('/cadastro-aluno', 'AlunoController@create')->name('cadastro.aluno.form');
Route::post('/cadastro-aluno', 'AlunoController@store')->name('cadastro.aluno.submit');
Route::get('/alunos/show/{id}', 'AlunoController@show')->name('mostrar.aluno');
Route::get('/alunos/editar/{id}', 'AlunoController@edit')->name('editar.aluno.form');
Route::post('/alunos/editar/{id}', 'AlunoController@update')->name('editar.aluno.submit');
Route::get('/alunos/apagar/{id}', 'AlunoController@destroy');

Route::get('/coordenadores', 'CoordenadorController@index')->name('coordenadores');
Route::get('/cadastro-coordenador', 'CoordenadorController@create')->name('cadastro.coordenador.form');
Route::post('/cadastro-coordenador', 'CoordenadorController@store')->name('cadastro.coordenador.submit');
Route::get('/coordenador/show/{id}', 'CoordenadorController@show')->name('mostrar.coordenador');
Route::get('/coordenador/editar/{id}', 'CoordenadorController@edit')->name('editar.coordenador.form');
Route::post('/coordenador/editar/{id}', 'CoordenadorController@update')->name('editar.coordenador.submit');
Route::get('/coordenador/apagar/{id}', 'CoordenadorController@destroy');

Route::get('/supervisores', 'SupervisorController@index')->name('supervisores');
Route::get('/cadastro-supervisor', 'SupervisorController@create')->name('cadastro.supervisor.form');
Route::post('/cadastro-supervisor', 'SupervisorController@store')->name('cadastro.supervisor.submit');
Route::get('/supervisor/show/{id}', 'SupervisorController@show')->name('mostrar.supervisor');
Route::get('/supervisor/editar/{id}', 'SupervisorController@edit')->name('editar.supervisor.form');
Route::post('/supervisor/editar/{id}', 'SupervisorController@update')->name('editar.supervisor.submit');
Route::get('/supervisor/apagar/{id}', 'SupervisorController@destroy');

Route::get('/empresas', 'EmpresaController@index')->name('empresas');
Route::get('/cadastro-empresa', 'EmpresaController@create')->name('cadastro.empresa.form');
Route::post('/cadastro-empresa', 'EmpresaController@store')->name('cadastro.empresa.submit');
Route::get('/empresa/editar/{id}', 'EmpresaController@edit')->name('editar.empresa.form');
Route::post('/empresa/editar/{id}', 'EmpresaController@update')->name('editar.empresa.submit');
Route::get('/empresa/apagar/{id}', 'EmpresaController@destroy');

Route::get('/instituicoes', 'InstituicaoController@index')->name('instituicoes');
Route::get('/cadastro-instituicao', 'InstituicaoController@create')->name('cadastro.instituicao.form');
Route::post('/cadastro-instituicao', 'InstituicaoController@store')->name('cadastro.instituicao.submit');
Route::get('/instituicao/show/{id}', 'InstituicaoController@show')->name('mostrar.instituicao');
Route::get('/instituicao/editar/{id}', 'InstituicaoController@edit')->name('editar.instituicao.form');
Route::post('/instituicao/editar/{id}', 'InstituicaoController@update')->name('editar.instituicao.submit');
Route::get('/instituicao/apagar/{id}', 'InstituicaoController@destroy');

Route::get('/cursos', 'CursoController@index')->name('cursos');
Route::get('/cadastro-curso', 'CursoController@create')->name('cadastro.curso.form');
Route::post('/cadastro-curso', 'CursoController@store')->name('cadastro.curso.submit');
Route::get('/curso/editar/{id}', 'CursoController@edit')->name('editar.curso.form');
Route::post('/curso/editar/{id}', 'CursoController@update')->name('editar.curso.submit');
Route::get('/curso/apagar/{id}', 'CursoController@destroy');








