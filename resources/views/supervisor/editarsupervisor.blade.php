@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Supervisor') }}</div>

                <div class="card-body">
                <form method="POST" action="/supervisor/{{$super->id}}">
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

                            <label for="empresa">Empresa</label>
                                <select class="custom-select" name="empresa">
                                    <option value="" disabled selected>Selecione uma empresa</option>
                                    @foreach($empresa as $empr)
                                        <option value="{{$empr->id}}">{{$empr->nome}}</option>
                                    @endforeach
                                </select>

                           <label for="cargo">Cargo</label>
                           <input type="text" class="form-control" name="cargo" placeholder="Cargo">

                           <label for="area">Área</label>
                           <input type="text" class="form-control" name="area" placeholder="Área">

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
