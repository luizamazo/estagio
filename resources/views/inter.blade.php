@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastrar Novo Usuário</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                
                <form method="POST" action="/inter">
                        @csrf
                   <div class="form-group row">
                            
                            <label for="select-role" class="col-md-4 col-form-label text-md-right">{{ __('O que deseja cadastrar?') }}</label>
                            <div class="col-md-6">
                                <select class="custom-select" name="role">
                                    <option value="1">Novo Aluno</option>
                                    <option value="2">Novo Supervisor</option>
                                    @if(Auth::guard('admin')->check())  
                                    <option value="3">Novo Coordenador</option>
                                    @endif                                
                                </select>
                               
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Prosseguir</button>
                        </div>
                </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
