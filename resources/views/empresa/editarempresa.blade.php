@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Empresa') }}</div>
                <form method="POST" action="/empresa/editar/{{$empr->id}}">
                     @csrf
                 <div class="card-body">
                    <div class="form-group">
                                <label for="razao">Razão Social</label>
                                <input type="text" class="form-control" name="razaoSocial" placeholder="Razão Social">

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
                            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                            <a href="{{ route('home') }}" class="btn btn-danger btn-sm">Cancelar</a>  
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
