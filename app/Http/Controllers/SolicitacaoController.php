<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Solicitacao;
use App\Aluno;
use Response;


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

    
    public function store(Request $request)
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
        
        $vaga->save();

        $log = new Log();
        //$log->log('solicitou', 'vaga', $target);

      //  return redirect('/supervisores');
    }

    
    public function show($id)
    {  
       
        $vaga = Vaga::where('id', $id)->get();
     
        return view('vagas.vaga-id', compact('esta'));
    }

    
    public function edit($id)
    {
        
        $vaga = Vaga::find($id);
        if(isset($vaga)) {
            return view('vagas.editarvaga', compact('esta'));
        }
        return redirect('/vaga-id');
    }


    
    public function update(Request $request, $id)
    {
        $vaga = Vaga::find($id);
        if(isset($vaga)) {
            $target = $super->nome = $request->input('nome');
            $super->nascimento = $request->input('nascimento');
            $super->cpf = $request->input('cpf');
            $super->rg = $request->input('rg');
            $super->contato = $request->input('contato');
            $super->empresa = $request->input('empresa');
            $super->cargo = $request->input('cargo');
            $super->area = $request->input('area');
            $super->save();

            $log = new Log();
            $log->log('editou', 'vaga', $target);
        }
        return redirect('/supervisor/show/{id}');
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
