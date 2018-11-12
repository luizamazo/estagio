@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Novo Estágio') }}</div>
                <form method="POST" action="/cadastro-empresa">
                     @csrf
                 <div class="card-body">
                    <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" class="form-control" name="titulo" placeholder="Título">

                                <label for="rg">Ramo</label>
                                <input type="text" class="form-control" name="ramo" placeholder="Ramo">

                                <label for="cnpj">CNPJ</label>
                                <input type="text" class="form-control" name="cnpj" placeholder="CNPJ">
                         
                                <label for="contato">Contato</label>
                                <input type="text" class="form-control" name="contato" placeholder="Contato">

                                <label for="endereco">Endereço</label>
                                <input type="text" class="form-control" name="endereco" placeholder="Endereco">

                                <label for="representante">Representante</label>
                                <input type="text" class="form-control" name="representante" placeholder="Representante">
                            
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
                            <a href="{{ route('home') }}" class="btn btn-danger btn-sm">Cancelar</a>  
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
