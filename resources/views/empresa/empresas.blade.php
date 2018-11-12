@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Empresas Cadastradas') }}</div>

                <div class="card-body">
                @if(count($empr) > 0)
                    <table class="table table-ordered table-hover">
                        <thead>
                            <tr>
                           
                                <th>Razão Social</th>
                                <th>Representante</th>
                                <th>Ramo</th>
                                <th>CNPJ</th>
                                <th>Endereço</th>
                                <th>Contato</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                @foreach($empr as $emp)
                            <tr>

                                <td>{{$emp->razao_social}}</td>
                                <td>{{$emp->representante}}</td>
                                <td>{{$emp->ramo}}</td>
                                <td>{{$emp->cnpj}}</td>
                                <td>{{$emp->endereco}}</td>
                                <td>{{$emp->contato}}</td>
                                <td>
                                    <a href="/empresa/editar/{{$emp->id}}" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="/empresa/apagar/{{$emp->id}}" class="btn btn-sm btn-danger">Apagar</a>
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