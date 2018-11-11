@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Aluno') }}</div>

                <div class="card-body">
                @if(count($aluno) > 0)
                    <table class="table table-ordered table-hover">
                        <thead>
                            <tr>
                                <th>RGA</th>
                                <th>Nome</th>
                                <th>Instituição</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                @foreach($aluno as $al)
                            <tr>
                                <td>{{$al->rga}}</td>
                                <td>{{$al->nome}}</td>
                                <td>{{$al->instituicao}}</td>
                             
                                <td>
                                    <a href="/alunos/show/{{$al->id}}" class="btn btn-sm btn-primary">Ver</a>
                                    <a href="/alunos/editar/{{$al->id}}" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="/alunos/apagar/{{$al->id}}" class="btn btn-sm btn-danger">Apagar</a>
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
