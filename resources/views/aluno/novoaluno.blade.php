@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Aluno') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="/aluno">
                        @csrf
                        <div class="form-group">
                           *Para cadastrar, um usuário já precisa ter sido previamente criado.
                            <label for="nome">Nome Completo</label>
                            <input type="text" class="form-control" name="nome" placeholder="Nome">

                            <label for="nascimento">Data de Nascimento</label>
                            <input type="date" class="form-control" name="nascimento" >

                            <label for="rga">RGA</label>
                            <input type="text" class="form-control" name="rga" placeholder="Ex. 201505100078">

                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" placeholder="Ex. 999.999.999-99">

                            <label for="rg">RG</label>
                            <input type="text" class="form-control" name="rg" placeholder="RG">

                            <label for="email">Email</label>                       
                            <input type="email" class="form-control" name="email">
                            
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
                        <button type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
                        <a href="{{ route('home') }}" class="btn btn-danger btn-sm">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
