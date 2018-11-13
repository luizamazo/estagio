@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Supervisor') }}</div>
                <form method="POST" action="/cadastrar/supervisor">
                     @csrf
                 <div class="card-body">
                    <div class="form-group">
                                <label for="nome">Nome Completo</label>
                                <input type="text" class="form-control" name="nome" placeholder="Nome">

                                <label for="nascimento">Data de Nascimento</label>
                                <input type="date" class="form-control" name="nascimento" >

                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control" name="cpf" placeholder="Ex. 999.999.999-99">

                                <label for="rg">RG</label>
                                <input type="text" class="form-control" name="rg" placeholder="RG">
                                
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="exemplo@exemplo.com">

                                <label for="contato">Contato</label>
                                <input type="text" class="form-control" name="contato" placeholder="Contato">

                                <label for="empresa">Empresa</label>
                                <input type="text" class="form-control" name="empresa" placeholder="Empresa">

                                <label for="cargo">Cargo</label>
                                <input type="text" class="form-control" name="cargo" placeholder="Cargo">

                                <label for="area">Área</label>
                                <input type="text" class="form-control" name="area" placeholder="Área">
                            
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
