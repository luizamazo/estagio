@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Cursos Cadastradas') }}</div>

                <div class="card-body">
                @if(count($curso) > 0)
                    <table class="table table-ordered table-hover">
                        <thead>
                            <tr>
                           
                                <th>Nome</th>
                                <th>Instituição</th>
                                <th>Campus</th>
                            </tr>
                        </thead>
                        <tbody>
                @foreach($curso as $cur)
                            <tr>

                                <td>{{$cur->nome}}</td>
                                <td>{{$cur->instituicao}}</td>
                                <td>{{$cur->campus}}</td>
                                <
                                
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
