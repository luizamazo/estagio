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
                               <h5>CAMPUS: {{$ins->campus}}</h5>
                               <h5>ENDERECO: {{$ins->endereco}}</h5>
                              
                               <a href="/editar/instituicao/{{$ins->id}}" class="btn btn-sm btn-warning">Editar</a>
                               <a href="/deletar/instituicao/{{$ins->id}}" class="btn btn-sm btn-danger">Apagar</a>    
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
                                                <a href="/deletar/curso/{{$cur->id}}" class="btn btn-sm btn-danger">Apagar</a>
                                            </td>
                                        
                                        </tr>
                @endforeach                
                                    </tbody>
                                </table>
                @endif
                @if(count($curso) == 0)
                    <h5>Ainda não há cursos cadastrados para essa instituição</h5>
                @endif        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
