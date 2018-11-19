@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Coordenadores') }}</div>

                <div class="card-body">
                @if(count($cord) > 0)
                    <table class="table table-ordered table-hover">
                        <thead>
                            <tr>
                                <th>SIAPE</th>
                                <th>Nome</th>
                                <th>Instituição</th>
                                <th>Campus</th>
                                <th>Curso</th>
                                <th>Cargo</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                @foreach($cord as $cor)
                            <tr>
                                <td>{{$cor->siape}}</td>
                                <td>{{$cor->pessoa->nome}}</td>
                                <td>{{$cor->instituicao->nome}}</td>
                                <td>{{$cor->campus->nome}}</td>
                                <td>{{$cor->curso->nome}}</td>
                                <td>{{$cor->cargo}}</td>
                                <td>

                                 <form action="/coordenador/{{$cor->id}}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <a href="/coordenador/{{$cor->id}}" class="btn btn-sm btn-primary">Ver</a>
                                        <a href="/coordenador/{{$cor->id}}/edit" class="btn btn-sm btn-warning">Editar</a>
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
                            <a href="/coordenador/create" class="btn btn-success center-block">Adicionar Novo Coordenador</a>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
