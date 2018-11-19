@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Perfil do Coordenador') }}</div>

                <div class="card-body">
                      
                @foreach($cord as $cor)
                               <h3>Informações Pessoais</h3>
                               <h4>ID: {{$cor->id}}</h4>
                               <h4>NOME: {{$cor->nome}}</h4>
                               <h4>DATA DE NASCIMENTO: {{$cor->nascimento}}</h4>
                               <h4>CPF: {{$cor->cpf}}</h4>
                               <h4>RG: {{$cor->rg}}</h4>
                               <h4>EMAIL: {{$cor->email}}</h4>
                               <h4>CONTATO: {{$cor->contato}}</h4>
                               <h4>INSTITUIÇÃO: {{$cor->instituicao}}</h4>
                               <h4>CAMPUS: {{$cor->campus}}</h4>
                               <h4>CURSO: {{$cor->curso}}</h4>
                               <h4>CARGO: {{$cor->cargo}}</h4>
                               <h4>SIAPE: {{$cor->siape}}</h4>
                               <a href="/editar/coordenador/{{$cor->id}}" class="btn btn-sm btn-warning">Editar</a>
                               <a href="/deletar/coordenador/{{$cor->id}}" class="btn btn-sm btn-danger">Apagar</a>    
                @endforeach          
                                <hr>
                                <h3>Informações de Estágio</h3>


                                <a href="/coordenador-vaga/editar/{{$cord->id}}" class="btn btn-sm btn-warning">Editar</a>
                                <a href="/coordenador-vaga/apagar/{{$cord->id}}" class="btn btn-sm btn-danger">Apagar</a>
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
