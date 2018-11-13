@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Perfil do Supervisor') }}</div>

                <div class="card-body">
                      
                @foreach($super as $sup)
                               <h3>Informações Pessoais</h3>
                               <h4>ID: {{$sup->id}}</h4>
                               <h4>NOME: {{$sup->nome}}</h4>
                               <h4>DATA DE NASCIMENTO: {{$sup->nascimento}}</h4>
                               <h4>CPF: {{$sup->cpf}}</h4>
                               <h4>RG: {{$sup->rg}}</h4>
                               <h4>EMAIL: {{$sup->email}}</h4>
                               <h4>CONTATO: {{$sup->contato}}</h4>
                               <h4>EMPRESA: {{$sup->empresa}}</h4>
                               <h4>CARGO: {{$sup->cargo}}</h4>
                               <h4>ÁREA: {{$sup->area}}</h4>
                               <a href="/editar/coordenador/{{$sup->id}}" class="btn btn-sm btn-warning">Editar</a>
                               <a href="/deletar/coordenador/{{$sup->id}}" class="btn btn-sm btn-danger">Apagar</a>    
                @endforeach          
                                <hr>
                                <h3>Informações de Estágio</h3>


                                <a href="/coordenador-vaga/editar/{{$super->id}}" class="btn btn-sm btn-warning">Editar</a>
                                <a href="/coordenador-vaga/apagar/{{$super->id}}" class="btn btn-sm btn-danger">Apagar</a>
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
