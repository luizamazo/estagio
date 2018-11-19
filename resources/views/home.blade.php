@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard - Usuário</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                     <div class="links">
                        <a class='btn btn-lg btn-danger' href="/aluno">Lista de alunos</a>
                        <a class='btn btn-lg btn-danger' href="/supervisor">Lista de supervisores</a>
                        <a class='btn btn-lg btn-danger' href="/coordenador">Lista de coordenadores</a>
                        <a class='btn btn-lg btn-danger' href="/instituicao">Lista de instituições</a>
                        <a class='btn btn-lg btn-danger' href="/empresa">Lista de empresas</a>
                        <a class='btn btn-lg btn-danger' href="/vaga">Lista de vagas de estágio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
