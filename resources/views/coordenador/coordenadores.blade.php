@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
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
                                <td>{{$cor->nome}}</td>
                                <td>{{$cor->instituicao}}</td>
                                <td>{{$cor->campus}}</td>
                                <td>{{$cor->curso}}</td>
                                <td>{{$cor->cargo}}</td>
                                <td>

                                 <form action="/deletar/coordenador/{{$cor->id}}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <a href="/mostrar/coordenador/{{$cor->id}}" class="btn btn-sm btn-primary">Ver</a>
                                        <a href="/editar/coordenador/{{$cor->id}}" class="btn btn-sm btn-warning">Editar</a>
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
