@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Solicitar Estágio') }}</div>
               
                 <div class="card-body">
                
                      
                      @foreach($vaga as $vag)
                                     <h3>Estágios</h3>
                                     <h4>ID: {{$vag->id}}</h4>
                                     <h4>NOME: {{$vag->titulo}}</h4>
                                     <h4>ÁREA: {{$vag->area}}</h4>
                                     <h4>EMPRESA: {{$vag->empresa->razao_social}}</h4>
                                     <h4>REQUISITOS: {{$vag->requisitos}}</h4>
                                     <h4>SUPERVISOR: {{$vag->supervisor->nome}}</h4>
                                     
                                     <hr>
                      @endforeach          
                        <form method="POST" action="/cadastrar/vaga">
                                @csrf
                        <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" class="form-control" name="titulo" placeholder="Título">

                                <label for="area">Área</label>
                                <input type="text" class="form-control" name="area" placeholder="area">

                               <label for="empresa">Empresa</label>
                                <select class="custom-select" name="empresa">
                                    <option value="" disabled selected>Selecione uma empresa</option>
                                    @foreach($empr as $emp)
                                        <option value="{{$emp->id}}">{{$emp->razao_social}}</option>
                                    @endforeach
                                </select>
                         
                                <label for="supervisor">Supervisor</label>
                                <select class="custom-select" name="supervisor">
                                    <option value="" disabled selected>Selecione um supervisor</option>
                                    @foreach($super as $sup)
                                        <option value="{{$sup->id}}">{{$sup->nome}}</option>
                                    @endforeach
                                </select>

                                <label for="requisitos">Requisitos</label>
                                <input type="text" class="form-control" name="requisitos" placeholder="Requisitos">
                            
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
