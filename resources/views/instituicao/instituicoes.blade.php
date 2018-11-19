@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Instituições Cadastradas') }}</div>

                <div class="card-body">
                @if(count($inst) > 0)
                    <table class="table table-ordered table-hover">
                        <thead>
                            <tr>
                           
                                <th>Nome</th>
                                <th>CNPJ</th>
                                <th>Tipo</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                @foreach($inst as $ins)
                            <tr>

                                <td>{{$ins->nome}}</td>
                                <td>{{$ins->cnpj}}</td>
                                <td>{{$ins->tipo}}</td>
                                <td>{{$ins->email}}</td>
                                <td>{{$ins->telefone}}</td>
                                
                                <td>

                                  <form action="/instituicao/{{$ins->id}}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <a href="/instituicao/{{$ins->id}}" class="btn btn-sm btn-primary">Ver</a>
                                        <a href="/instituicao/{{$ins->id}}/edit" class="btn btn-sm btn-warning">Editar</a>
                                      
                                         <button  type="submit" class="btn btn-sm btn-danger">Apagar</button>
                                    </form>
                                 
                                </td>
                              
                            </tr>
                @endforeach                
                        </tbody>
                    </table>
                @endif      
                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="/instituicao/create" class="btn btn-success center-block">Adicionar Nova Instituição</a>  
                            <a href="/inter/campus" class="btn btn-success center-block">Adicionar Novo Campus</a>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
