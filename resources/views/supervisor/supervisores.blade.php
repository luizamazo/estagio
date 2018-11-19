@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Supervisores') }}</div>

                <div class="card-body">
                @if(count($super) > 0)
                    <table class="table table-ordered table-hover">
                        <thead>
                            <tr>
                           
                                <th>Nome</th>
                                <th>Empresa</th>
                                <th>Cargo</th>
                                <th>Contato</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                @foreach($super as $sup)
                            <tr>
                          
                                <td>{{$sup->pessoa->nome}}</td>
                                <td>{{$sup->empresa->nome}}</td>
                                <td>{{$sup->cargo}}</td>
                                <td>{{$sup->telefone->celular}}</td>
                                <td>

                                   <form action="/supervisor/{{$sup->id}}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <a href="/supervisor/{{$sup->id}}" class="btn btn-sm btn-primary">Ver</a>
                                        <a href="/supervisor/{{$sup->id}}/edit" class="btn btn-sm btn-warning">Editar</a>
                                      
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
                            <a href="/supervisor/create" class="btn btn-success center-block">Adicionar Novo Supervisor</a>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
