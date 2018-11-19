@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Instituição') }}</div>
                <form method="POST" action="/instituicao/{{$inst->id}}">
                     @csrf
                     {{ method_field('PUT') }}
                 <div class="card-body">
                    <div class="form-group">
                                <label for="nome">Nome da Instituição</label>
                                <input type="text" class="form-control" name="nome" placeholder="Nome">

                                <label for="cnpj">CNPJ</label>
                                <input type="text" class="form-control" name="cnpj" placeholder="CNPJ">

                                 <label for="tipo">Tipo</label>
                                <input type="text" class="form-control" name="tipo" placeholder="Tipo">
                         
                                <label for="contato">Contato</label>
                                <input type="text" class="form-control" name="contato" placeholder="Contato">

                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Ex. exemplo@exemplo.com">

                                <label for="site">Site</label>
                                <input type="text" class="form-control" name="site" placeholder="Site">

                                <label for="endereco">Endereço</label>
                                <input type="text" class="form-control" name="endereco" placeholder="Endereco">

                                <label for="campus">Campus</label>
                                <input type="text" class="form-control" name="campus" placeholder="campus">
                            
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
