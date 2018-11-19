@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Informações da Instituição') }}</div>

                <div class="card-body">
                      
                @foreach($empr as $emp)
                
                               <h3>{{$emp->nome}}</h3>
                               <h5>Ramo: {{$emp->ramo}}</h5>
                               <h5>CNPJ: {{$emp->cnpj}}</h5>
                               <h5>TELEFONE: {{$emp->telefone}}</h5>
                               <h5>EMAIL: {{$emp->email}}</h5>
                               <h5>SITE: {{$emp->site}}</h5>
                               <h5>ENDEREÇO: {{$emp->endereco->rua}} | Bairro: {{$emp->endereco->bairro}}</h5>
                               <h5>CIDADE: {{$emp->endereco->cidade}}</h5>
                               <h5>CEP: {{$emp->endereco->cep}}</h5>
                              
                               <form action="/empresa/{{$emp->id}}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <a href="/empresa/{{$emp->id}}/edit" class="btn btn-sm btn-warning">Editar</a>
                                         <button  type="submit" class="btn btn-sm btn-danger">Apagar</button>
                                    </form>     
                @endforeach          
            </div>
        </div>
    </div>
</div>
@endsection
