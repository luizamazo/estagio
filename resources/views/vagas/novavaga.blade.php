@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Novo Estágio') }}</div>
                <form method="POST" action="/vaga">
                     @csrf
                 <div class="card-body">
                    <div class="form-group">

                                <label for="coordenador">Coordenador Responsável</label>
                                    <select class="custom-select" name="coordenador">
                                        <option value="" disabled selected>Selecione um coordenador</option>
                                        @foreach($coor as $cor)
                                            <option value="{{$cor->id}}">{{$cor->pessoa->nome}}</option>
                                        @endforeach
                                    </select>
                                <label for="titulo">Título</label>
                                <input type="text" class="form-control" name="titulo" placeholder="Título">

                                <label for="area">Área</label>
                                <input type="text" class="form-control" name="area" placeholder="Área">

                               <label for="empresa">Empresa</label>
                                <select class="custom-select" name="empresa">
                                    <option value="" disabled selected>Selecione uma empresa</option>
                                    @foreach($empr as $emp)
                                        <option value="{{$emp->id}}">{{$emp->nome}}</option>
                                    @endforeach
                                </select>
                         
                                <label for="supervisor">Supervisor</label>
                                <select class="custom-select" name="supervisor">
                                    <option value="" disabled selected>Selecione um supervisor</option>
                                    @foreach($super as $sup)
                                        <option value="{{$sup->id}}">{{$sup->pessoa->nome}}</option>
                                    @endforeach
                                </select>

                                <label for="requisitos">Requisitos</label>
                                <textarea name="requisitos" class="form-control" rows="5" id="requisitos"></textarea>

                            
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
                            <a href="{{ route('home') }}" class="btn btn-danger btn-sm">Cancelar</a>  
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
