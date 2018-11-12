@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('EDITAR ALUNO') }}</div>

                <div class="card-body">
                    <form method="POST" action="/alunos/editar/{{$alu->id}}">
                        @csrf

                        <div class="form-group">
                            <label for="nome">Nome Completo</label>
                            <input type="text" class="form-control" name="nome" placeholder="Nome">

                            <label for="nascimento">Data de Nascimento</label>
                            <input type="date" class="form-control" name="nascimento" >

                            <label for="rga">RGA</label>
                            <input type="text" class="form-control" name="rga" placeholder="Ex. 201505100078">

                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" placeholder="Ex. 999.999.999-99">

                            <label for="rg">RG</label>
                            <input type="text" class="form-control" name="rg" placeholder="RG">
                            
                            <label for="contato">Contato</label>
                            <input type="text" class="form-control" name="contato" placeholder="Contato">

                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" name="endereco" placeholder="Rua, Bairro">

                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" name="cidade" placeholder="Cidade">

                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" name="cep" placeholder="99999999">

                            <label for="instituicao">Instituição</label>
                            <input type="text" class="form-control" name="instituicao" placeholder="Instituicao">

                            <label for="campus">Campus</label>
                            <input type="text" class="form-control" name="campus" placeholder="Campus">

                            <label for="curso">Curso</label>
                            <input type="text" class="form-control" name="curso" placeholder="Curso">

                            <label for="semestre">Semestre</label>
                            <input type="text" class="form-control" name="semestre" placeholder="Semestre">

                           
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
