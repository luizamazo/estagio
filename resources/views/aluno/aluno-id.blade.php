@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Perfil do Aluno') }}</div>

                <div class="card-body">
                      
                @foreach($aluno as $al)
                               <h3>Informações Pessoais</h3>
                               <h4>ID: {{$al->id}}</h4>
                               <h4>NOME: {{$al->nome}}</h4>
                               <h4>DATA DE NASCIMENTO: {{$al->nascimento}}</h4>
                               <h4>RGA: {{$al->rga}}</h4>
                               <h4>CPF: {{$al->cpf}}</h4>
                               <h4>RG: {{$al->rg}}</h4>
                               <h4>EMAIL: {{$al->email}}</h4>
                               <h4>CONTATO: {{$al->contato}}</h4>
                               <h4>ENDEREÇO: {{$al->endereco}}</h4>
                               <h4>CIDADE: {{$al->cidade}}</h4>
                               <h4>CEP: {{$al->cep}}</h4>
                               <h4>INSTITUIÇÃO: {{$al->instituicao}}</h4>
                               <h4>CAMPUS: {{$al->campus}}</h4>
                               <h4>CURSO: {{$al->curso}}</h4>
                               <h4>SEMESTRE: {{$al->semestre}}</h4>
                               <a href="/alunos/editar/{{$al->id}}" class="btn btn-sm btn-warning">Editar</a>
                               <a href="/alunos/apagar/{{$al->id}}" class="btn btn-sm btn-danger">Apagar</a>    
                @endforeach          
                                <hr>
                                <h3>Informações de Estágio</h3>


                                <a href="/alunos-estagio/editar/{{$al->id}}" class="btn btn-sm btn-warning">Editar</a>
                                <a href="/alunos-estagio/apagar/{{$al->id}}" class="btn btn-sm btn-danger">Apagar</a>
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
