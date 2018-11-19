@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Perfil do Coordenador') }}</div>

                <div class="card-body">
                      
                @foreach($coor as $cor)
                               <h3>Informações Pessoais</h3>
                               <h4>NOME: {{$cor->pessoa->nome}}</h4>
                               <h4>DATA DE NASCIMENTO: {{date('d/m/Y', strtotime($cor->pessoa->nascimento))}}</h4>
                               <h4>CPF: {{$cor->pessoa->cpf}}</h4>
                               <h4>RG: {{$cor->pessoa->rg}}</h4>
                               <h4>EMAIL: {{$cor->pessoa->email}}</h4>
                               <h4>TELEFONE FIXO: {{$cor->telefone->fixo}} | TELEFONE CELULAR: {{$cor->telefone->celular}}</h4>
                               <h4>INSTITUIÇÃO: {{$cor->instituicao->nome}}</h4>
                               <h4>CAMPUS: {{$cor->campus->nome}}</h4>
                               <h4>CURSO: {{$cor->curso->nome}}</h4>
                               <h4>CARGO: {{$cor->cargo}}</h4>
                               <h4>SIAPE: {{$cor->siape}}</h4>
                               <form action="/coordenador/{{$cor->id}}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <a href="/coordenador/{{$cor->id}}/edit" class="btn btn-sm btn-warning">Editar</a>
                                         <button  type="submit" class="btn btn-sm btn-danger">Apagar</button>
                                    </form>  
                @endforeach          
                                <hr>
                                <h3>Informações de Estágio</h3>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
