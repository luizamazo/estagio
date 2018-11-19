@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Cadastrar Novo Usuário</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                
                <form method="POST" action="/inter/campus">
                        @csrf
                   <div class="form-group row">
                            
                            <label for="nome">Nome do Campus</label>
                            <input type="text" class="form-control" name="nome" placeholder="Nome">

                            <label for="instituicao">Instituição</label>
                                <select class="custom-select" name="instituicao">
                                    <option value="" disabled selected>Selecione uma instituição</option>
                                    @foreach($inst as $ins)
                                        <option value="{{$ins->id}}">{{$ins->nome}}</option>
                                    @endforeach
                                </select>
                               
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                     <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                                </div>
                    </div>
                        </div>
                </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
