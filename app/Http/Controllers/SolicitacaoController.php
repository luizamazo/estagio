<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Solicitacao;
use App\Aluno;
use App\Vaga;
use Response;
use App\Log;


class SolicitacaoController extends Controller
{
 
    public function index()
    {
        $solicitacao = Solicitacao::all();
        return view('vagas.vagas', compact('esta'), 'aluno');
    }

    public function create($v, $a)
    {
        $vaga = Vaga::where('$v', $v);
        return view('solicitacao.novasolicitacao', 'vaga');
    }

    
    public function store(Request $request, $vaga_id)
    {
       $solicitacao = new Solicitacao();
       $solicitacao->nome = $request->input('nome');
       $solicitacao->nascimento = $request->input('nascimento');
       $solicitacao->cpf = $request->input('cpf');
       $solicitacao->rg = $request->input('rg');
       $solicitacao->celular = $request->input('celular');
       $solicitacao->fixo = $request->input('fixo');
       $solicitacao->rga = $request->input('rga');
       $solicitacao->estagioInicio = $request->input('estagioInicio');
       $solicitacao->estagioFinal = $request->input('estagioFinal');
       $solicitacao->tarefas = $request->input('tarefas');
       $solicitacao->status = $request->input('status');
       $solicitacao->carga = $request->input('carga');
       
       $solicitacao->vaga_id = $vaga_id;
       $solicitacao->titulo =  Vaga::where('id', $vaga_id)->get()->first()->titulo;
       $coor_id = Vaga::where('id', $vaga_id)->get()->first()->coor_id;
       $solicitacao->coor_id = $coor_id;
       $super_id = Vaga::where('id', $vaga_id)->get()->first()->super_id;
       $solicitacao->super_id = $super_id;

       $solicitacao->aluno_id = $request->input('aluno_id');

       $solicitacao->save();

        //$log->log('solicitou', 'vaga', $target);

    }

    
    public function show($id)
    {  
       
        $solicitacoes = Solicitacao::where('coor_id', $id)
            ->with('vaga', 'aluno', 'supervisor', 'coordenador')
            ->get();

        return Response::json([
            'solicitacoes' => $solicitacoes
        ]);

    }

    public function showAluno($id)
    {  
       
        $solicitacao = Solicitacao::where('aluno_id', $id)
            ->with('vaga', 'aluno', 'supervisor', 'coordenador')
            ->get();

        return Response::json([
            'solicitacao' => $solicitacao
        ]);

    }


    
    public function edit($id)
    {
        
        
    }


    
    public function update(Request $request, $id)
    {
        $solicitacao = Solicitacao::where('id', $id)->update($request->only(['status']));
  
       // $log = new Log();
       // $log->log('decidiu', 'solicitação');
        
       if($request->input('APROVADO')){
            app('App\Http\Controllers\EstagioController')->store($request, $role);
       }
        return Response::json([
                'msg' => 'status mudado'
            ]);
    }

   
    public function destroy($id)
    {
        $vaga = Vaga::find($id);
        if (isset($vaga)) {
            $vaga->delete();
            $log = new Log();
            $target = $vaga->nome;
            $log->log('deletou', 'vaga', $target);
        }
        return redirect('/supervisores');
    }
}
