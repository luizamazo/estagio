@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Alunos') }}</div>

                <div class="card-body">
                @if(count($alu) > 0)
                    <table class="table table-ordered table-hover">
                        <thead>
                            <tr>
                                <th>RGA</th>
                                <th>Nome</th>
                                <th>Instituição</th>
                                <th>Campus</th>
                                <th>Curso</th>
                                <th>Semestre</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                @foreach($alu as $al)
                            <tr>
                                <td>{{$al->rga}}</td>
                                <td>{{ucwords($al->pessoa->nome)}}</td>
                                <td>{{$al->instituicao->nome}}</td>
                                <td>{{$al->campus->nome}}</td>
                                <td>{{$al->curso->nome}}</td>
                                <td>{{$al->semestre}}</td>
                                <td>
                                   
                                    <form action="/aluno/{{$al->id}}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <a href="/aluno/{{$al->id}}" class="btn btn-sm btn-primary">Ver</a>
                                        <a href="/aluno/{{$al->id}}/edit" class="btn btn-sm btn-warning">Editar</a>
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
                            <a href="/aluno/create" class="btn btn-success center-block">Adicionar Novo Aluno</a>  
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
