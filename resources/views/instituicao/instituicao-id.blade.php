@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Informações da Instituição') }}</div>

                <div class="card-body">
                      
                @foreach($inst as $ins)
                
                               <h3>{{$ins->nome}}</h3>
                               <h5>CNPJ: {{$ins->cnpj}}</h5>
                               <h5>CONTATO: {{$ins->contato}}</h5>
                               <h5>EMAIL: {{$ins->email}}</h5>
                               <h5>SITE: {{$ins->site}}</h5>
                               <h5>TIPO: {{$ins->tipo}}</h5>
                               <h5>CAMPUS: {{$campus}}</h5>
                               <h5>ENDEREÇO: {{$ins->endereco->rua}} | Bairro: {{$ins->endereco->bairro}}</h5>
                               <h5>CIDADE: {{$ins->endereco->cidade}}</h5>
                               <h5>CEP: {{$ins->endereco->cep}}</h5>
                              
                               <form action="/instituicao/{{$ins->id}}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <a href="/instituicao/{{$ins->id}}/edit" class="btn btn-sm btn-warning">Editar</a>
                                         <button  type="submit" class="btn btn-sm btn-danger">Apagar</button>
                                    </form>     
                @endforeach          

                                <!-- põe um scroll aqui-->
                                <hr>
                                <h3>Cursos</h3>
                                <br>
                @if(count($curso) > 0)
                                <table class="table table-ordered table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                @foreach($curso as $cur)
                                        <tr>
                                            <td>{{$cur->nome}}</td>
                                            <td>
                                            <form action="/curso/{{$cur->id}}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button  type="submit" class="btn btn-sm btn-danger">Apagar</button>
                                    </form>     
                                            </td>
                                        
                                        </tr>
                @endforeach                
                                    </tbody>
                                </table>
                @endif
                @if(count($curso) == 0)
                    <h5>Ainda não há cursos cadastrados para essa instituição</h5><br>
                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="/curso/create" class="btn btn-success center-block">Adicionar Novo Curso</a>  
                        </div>
                    </div>
                @endif        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
