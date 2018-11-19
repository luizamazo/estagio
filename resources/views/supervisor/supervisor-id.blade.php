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
                               <h4>NOME: {{$sup->pessoa->nome}}</h4>
                               <h4>DATA DE NASCIMENTO: {{date('d/m/Y', strtotime($sup->pessoa->nascimento))}}</h4>
                               <h4>CPF: {{$sup->pessoa->cpf}}</h4>
                               <h4>RG: {{$sup->pessoa->rg}}</h4>
                               <h4>EMAIL: {{$sup->pessoa->email}}</h4>
                               <h4>TELEFONE FIXO: {{$sup->telefone->fixo}} | TELEFONE CELULAR: {{$sup->telefone->celular}}</h4>
                               <h4>EMPRESA: {{$sup->empresa->nome}}</h4>
                               <h4>CARGO: {{$sup->cargo}}</h4>
                               <h4>ÁREA: {{$sup->area}}</h4>
                               <form action="/supervisor/{{$sup->id}}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <a href="/supervisor/{{$sup->id}}/edit" class="btn btn-sm btn-warning">Editar</a>
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
