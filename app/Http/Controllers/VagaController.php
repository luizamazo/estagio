<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Aluno;
use App\Vaga;
use App\Supervisor;
use App\Empresa;
use App\Log;
use App\Coordenador;
use Auth;

class VagaController extends Controller
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
        $vaga = Vaga::all();
        $aluno = Aluno::where('id', Auth::id());
        return view('vagas.vagas', compact('vaga', 'aluno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $super = Supervisor::all();
        $empr = Empresa::all();
        return view('vagas.novavaga', compact('super', 'empr'));
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

        //pega id da sessao = id do coord pra salvar no coor_id, gambiarra do caralho

        $t = Coordenador::where('user_id', Auth::id())->first()->id;
        $vaga->coor_id = $t;
        
        
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
