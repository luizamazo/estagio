@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Vagas de Estágios') }}</div>

                <div class="card-body">
                      
                @foreach($vaga as $vag)
                               <h3>Vagas</h3>
                               <h4>COORDENADOR: {{$vag->coordenador->pessoa->nome}}
                               <h4>NOME: {{$vag->titulo}}</h4>
                               <h4>ÁREA: {{$vag->area}}</h4>
                               <h4>EMPRESA: {{$vag->empresa->nome}}</h4>
                               <h4>REQUISITOS: {{$vag->requisitos}}</h4>
                               
                              <!-- <a href="/solicitar/v{{$vag->id}}/{{$vag->id}}" class="btn btn-sm btn-warning">Solicitar Vaga</a> -->
                              
                               <hr>
                @endforeach          
                                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
