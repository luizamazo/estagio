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
                               <h4>NOME: {{$al->pessoa->nome}}</h4>
                               <h4>DATA DE NASCIMENTO: {{date('d/m/Y', strtotime($al->pessoa->nascimento))}}</h4>
                               <h4>RGA: {{$al->rga}}</h4>
                               <h4>CPF: {{$al->pessoa->cpf}}</h4>
                               <h4>RG: {{$al->pessoa->rg}}</h4>
                               <h4>EMAIL: {{$al->pessoa->email}}</h4>
                               <h4>TELEFONE FIXO: {{$al->telefone->fixo}} | TELEFONE CELULAR: {{$al->telefone->celular}}</h4>
                               <h4>ENDEREÇO: {{$al->endereco->rua}} | Bairro: {{$al->endereco->bairro}}</h4>
                               <h4>CIDADE: {{$al->endereco->cidade}}</h4>
                               <h4>CEP: {{$al->endereco->cep}}</h4>
                               <h4>INSTITUIÇÃO: {{$al->instituicao->nome}}</h4>
                               <h4>CAMPUS: {{$al->campus->nome}}</h4>
                               <h4>CURSO: {{$al->curso->nome}}</h4>
                               <h4>SEMESTRE: {{$al->semestre}}</h4>
                               <form action="/aluno/{{$al->id}}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <a href="/aluno/{{$al->id}}/edit" class="btn btn-sm btn-warning">Editar</a>
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
