@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Cursos Cadastrados') }}</div>

                <div class="card-body">
                @if(count($curso) > 0)
                    <table class="table table-ordered table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Instituição</th>
                                <th>Campus</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                @foreach($curso as $cur)
                            <tr>

                                <td>{{$cur->nome}}</td>
                                <td>{{$cur->instituicao->nome}}</td>
                                <td>{{$cur->campus->nome}}</td>
                                
                                <td>

                                <form action="/curso/{{$cur->id}}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        
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
