@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Instituição') }}</div>
                <form method="POST" action="/instituicao">
                     @csrf
                 <div class="card-body">
                    <div class="form-group">
                                <label for="nome">Nome da Instituição</label>
                                <input type="text" class="form-control" name="nome" placeholder="Nome">

                                <label for="cnpj">CNPJ</label>
                                <input type="text" class="form-control" name="cnpj" placeholder="CNPJ">

                                 <label for="tipo">Tipo</label>
                                <select class="custom-select" name="tipo" id="tipo">
                                    <option value="Pública">Pública</option>
                                    <option value="Privada">Privada</option>
                                </select>
                         
                                <label for="contato">Contato</label>
                                <input type="text" class="form-control" name="contato" placeholder="Contato">

                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Ex. exemplo@exemplo.com">

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

                                <label for="campus">Campus</label>
                                <input type="text" class="form-control" name="campus" placeholder="Campus">

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
