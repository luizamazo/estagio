@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                @foreach($empr as $emp)
                            <tr>

                                <td>{{$emp->nome}}</td>
                                <td>{{$emp->representante}}</td>
                                <td>{{$emp->ramo}}</td>
                                <td>{{$emp->cnpj}}</td>
                                <td>{{$emp->email}}</td>
                                <td>{{$emp->telefone}}</td>
                                <td>

                                 <form action="/empresa/{{$emp->id}}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <a href="/empresa/{{$emp->id}}" class="btn btn-sm btn-primary">Ver</a>
                                        <a href="/empresa/{{$emp->id}}" class="btn btn-sm btn-warning">Editar</a>
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
                            <a href="/empresa/create" class="btn btn-success center-block">Adicionar Nova Empresa</a>  
                        </div>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
