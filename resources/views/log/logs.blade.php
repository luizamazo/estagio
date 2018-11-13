@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Logs') }}</div>

                <div class="card-body">
                @if(count($logs) > 0)
                    <table class="table table-ordered table-hover">
                        <thead>
                            <tr>
                                <th>Autor</th>
                                <th>Ação</th>
                                <th>Tipo</th>
                                <th>Alvo</th>
                                <th>Data</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                @foreach($logs as $log)
                            <tr>
                                <td>{{ucwords($log->autor)}}</td>
                                <td>{{ucwords($log->acao)}}</td>
                                <td>{{ucwords($log->tipo)}}</td>
                                <td>{{ucwords($log->alvo)}}</td>
                                <td>{{ucwords(date('d-m-Y | H:i:m', strtotime($log->created_at)))}}</td>
                              
                            </tr>
                @endforeach                
                        </tbody>
                    </table>
                @endif        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
