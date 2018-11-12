@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
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
                                <th>Contato</th>
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
                                <td>{{$ins->contato}}</td>
                                
                                <td>
                                    <a href="/instituicao/show/{{$ins->id}}" class="btn btn-sm btn-primary">Ver</a>
                                    <a href="/instituicao/editar/{{$ins->id}}" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="/instituicao/apagar/{{$ins->id}}" class="btn btn-sm btn-danger">Apagar</a>
                                </td>
                              
                            </tr>
                @endforeach                
                        </tbody>
                    </table>
                @endif        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
