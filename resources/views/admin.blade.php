@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastrar Novo Usuário</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Você está logado como ADMINISTRADOR</h3>

                    <div class="links">
                        <a class='btn btn-lg btn-danger' href="/logs">Ver Logs</a>
                        <a class='btn btn-lg btn-danger' href="https://laravel.com/docs">TESTANO</a>
                        <a class='btn btn-lg btn-danger' href="https://laravel.com/docs">TESTANO</a>
                        <a class='btn btn-lg btn-danger' href="https://laravel.com/docs">TESTANO</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
