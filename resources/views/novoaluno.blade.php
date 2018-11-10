@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('CADASTRO DE ALUNO') }}</div>

                <div class="card-body">
                    <form method="POST" action="/cadastro-aluno">
                        @csrf

                        <div class="form-group">
                            <label for="nomeTarefa">Nome </label>
                            <input type="text" class="form-control" name="nome" 
                                id="nomeTarefa" placeholder="Nome">
                            <label for="descTarefa">RGA</label>
                            <input type="text" class="form-control" name="rga" 
                                id="descTarefa" placeholder="RGA">
                            <label for="horaTarefa">Email</label>
                            <input type="text" class="form-control" name="email" 
                                id="horaTarefa" placeholder="Email">

                                <label for="horaTarefa">Nascimento</label>
                            <input type="text" class="form-control" name="nascimento" 
                                id="horaTarefa" placeholder="Email">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                        <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
