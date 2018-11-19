@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Empresa') }}</div>
                <form method="POST" action="/empresa/{{$empr->id}}">
                     @csrf
                     {{ method_field('PUT') }}
                 <div class="card-body">
                    <div class="form-group">
                                <label for="razao">Razão Social</label>
                                <input type="text" class="form-control" name="razaoSocial" placeholder="Razão Social">

                                <label for="rg">Ramo</label>
                                <input type="text" class="form-control" name="ramo" placeholder="Ramo">

                                <label for="cnpj">CNPJ</label>
                                <input type="text" class="form-control" name="cnpj" placeholder="CNPJ">

                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email">
                         
                                <label for="contato">Telefone</label>
                                <input type="text" class="form-control" name="contato" placeholder="Contato">

                                <label for="site">Site</label>
                                <input type="text" class="form-control" name="site" placeholder="Site">

                                <label for="endereco">Endereço</label>
                                    <div class="form-row">
                                        <div class="col-3">
                                            <input type="text" class="form-control" name="rua" placeholder="Rua">
                                        </div>
                                        <div class="col-3">
                                            <input type="text" class="form-control" name="bairro" placeholder="Bairro">
                                        </div>    
                                        <div class="col-3">
                                            <input type="text" class="form-control" name="cidade" placeholder="Cidade">
                                        </div>    
                                        <div class="col">
                                            <input type="text" class="form-control" name="cep" placeholder="CEP">
                                        </div>
                                    </div>

                                <label for="representante">Representante</label>
                                <input type="text" class="form-control" name="representante" placeholder="Representante">
                            
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                            <a href="{{ route('home') }}" class="btn btn-danger btn-sm">Cancelar</a>  
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
