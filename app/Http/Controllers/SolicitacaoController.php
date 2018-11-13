<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Solicitacao;
use App\Vaga;
use App\Aluno;


class SolicitacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */

    public function __construct()
    {
        //dps coloco só pro adm acessar
        $this->middleware('auth');
    }
    
    public function index()
    {
        $solicitacao = Solicitacao::all();
        return view('vagas.vagas', compact('esta'), 'aluno');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($v, $a)
    {
        $vaga = Vaga::where('$v', $v);
        return view('solicitacao.novasolicitacao', 'vaga');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vaga = new Vaga();
        $target = $vaga->titulo = $request->input('titulo');
        $vaga->area = $request->input('area');
        $vaga->empresa_id = $request->input('empresa');
        $vaga->super_id = $request->input('supervisor');
        $vaga->requisitos = $request->input('requisitos');
        
        
        $vaga->save();

        $log = new Log();
        $log->log('criou', 'vaga', $target);

        return redirect('/supervisores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
       
        $vaga = Vaga::where('id', $id)->get();
     
        return view('vagas.vaga-id', compact('esta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $vaga = Vaga::find($id);
        if(isset($vaga)) {
            return view('vagas.editarvaga', compact('esta'));
        }
        return redirect('/vaga-id');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
