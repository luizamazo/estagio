@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Coordenador') }}</div>

                <div class="card-body">
                    <form method="POST" action="/coordenador/{{$cord->id}}">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                           
                            <label for="nome">Nome Completo</label>
                            <input type="text" class="form-control" name="nome" placeholder="Nome">

                            <label for="telefone">Telefone</label>
                            <div class="form-row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="fixo" placeholder="Fixo">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="celular" placeholder="Celular"> 
                                </div>
                            </div>

                            <label for="instituicao">Instituição</label>
                                <select class="custom-select" name="instituicao">
                                    <option value="" disabled selected>Selecione uma instituição</option>
                                    @foreach($inst as $ins)
                                        <option value="{{$ins->id}}">{{$ins->nome}}</option>
                                    @endforeach
                                </select>

                            <label for="campus">Campus</label>
                                <select class="custom-select" name="campus">
                                    <option value="" disabled selected>Selecione um Campus</option>
                                    @foreach($campus as $cam)
                                        <option value="{{$cam->id}}">{{$cam->nome}}</option>
                                    @endforeach
                                </select>    

                            <label for="curso">Curso</label>
                                <select class="custom-select" name="curso">
                                    <option value="" disabled selected>Selecione um curso</option>
                                    @foreach($curso as $curs)
                                        <option value="{{$curs->id}}">{{$curs->nome}}</option>
                                    @endforeach
                                </select>

                           <label for="cargo">Cargo</label>
                           <input type="text" class="form-control" name="cargo" placeholder="Cargo">

                           <label for="siape">SIAPE</label>
                           <input type="text" class="form-control" name="siape" placeholder="SIAPE">

                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                        <a href="{{ route('home') }}" class="btn btn-danger btn-sm">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
