@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Cursos') }}</div>
                <form method="POST" action="/curso">
                     @csrf
                 <div class="card-body">
                    <div class="form-group">
                                <label for="nome">Nome do Curso</label>
                                <input type="text" class="form-control" name="nome" placeholder="Nome">

                                <label for="instituicao">Instituição</label>
                                <select class="custom-select" name="instituicao">
                                    <option value="" disabled selected>Selecione uma instituição</option>
                                    @foreach($inst as $ins)
                                        <option value="{{$ins->id}}">{{$ins->nome}}</option>
                                    @endforeach
                                </select>

                                <label for="instituicao">Campus</label>
                                <select class="custom-select" name="campus">
                                    <option value="" disabled selected>Selecione um campus</option>
                                    @foreach($campus as $camp)
                                        <option value="{{$camp->id}}">{{$camp->nome}}</option>
                                    @endforeach
                                </select>

                            
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
