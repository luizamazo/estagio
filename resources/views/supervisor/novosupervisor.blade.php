@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Supervisor') }}</div>
                <form method="POST" action="/supervisor">
                     @csrf
                 <div class="card-body">
                 <div class="form-group">
                 *Para cadastrar, um usuário já precisa ter sido previamente criado.
                            <label for="nome">Nome Completo</label>
                            <input type="text" class="form-control" name="nome" placeholder="Nome">

                            <label for="nascimento">Data de Nascimento</label>
                            <input type="date" class="form-control" name="nascimento" >

                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" placeholder="Ex. 999.999.999-99">

                            <label for="rg">RG</label>
                            <input type="text" class="form-control" name="rg" placeholder="RG">

                            <label for="email">Email</label>                       
                            <input type="email" class="form-control" name="email">
                            
                            <label for="telefone">Telefone</label>
                            <div class="form-row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="fixo" placeholder="Fixo">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="celular" placeholder="Celular"> 
                                </div>
                            </div>

                            <label for="empresa">Empresa</label>
                                <select class="custom-select" name="empresa">
                                    <option value="" disabled selected>Selecione uma empresa</option>
                                    @foreach($empresa as $emp)
                                        <option value="{{$emp->id}}">{{$emp->nome}}</option>
                                    @endforeach
                                </select>

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
