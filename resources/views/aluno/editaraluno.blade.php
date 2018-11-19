@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Aluno') }}</div>

                <div class="card-body">
                    <form method="POST" action="/aluno/{{$alu->id}}">
                        @method('put')
                        @csrf
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

                            <label for="endereco">Endereço</label>
                            <div class="form-row">
                                <div class="col-3">
                                    <input type="text" class="form-control" name="rua" placeholder="Rua">
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control" name="bairro" placeholder="Bairro">
                                </div>    
                                <div class="col-3">
                                    <input type="text" class="form-control" name="cidade" placeholder="Cidade">
                                </div>    
                                <div class="col">
                                    <input type="text" class="form-control" name="cep" placeholder="CEP">
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

                            <label for="semestre">Semestre</label>
                            <input type="text" class="form-control" name="semestre" placeholder="Semestre">

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
