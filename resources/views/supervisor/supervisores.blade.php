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
                          
                                <td>{{$sup->nome}}</td>
                                <td>{{$sup->empresa}}</td>
                                <td>{{$sup->cargo}}</td>
                                <td>{{$sup->contato}}</td>
                                <td>

                                   <form action="/deletar/coordenador/{{$sup->id}}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <a href="/coordenador/{{$sup->id}}" class="btn btn-sm btn-primary">Ver</a>
                                        <a href="/editar/coordenador/{{$sup->id}}" class="btn btn-sm btn-warning">Editar</a>
                                      
                                         <button  type="submit" class="btn btn-sm btn-danger">Apagar</button>
                                    </form>
                                   
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
