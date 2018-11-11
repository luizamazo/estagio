<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\User;

class AlunoController extends Controller
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
        $alu = Aluno::all();
        return view('alunos', compact('alu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novoaluno');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alu = new Aluno();
        $alu->nome = $request->input('nome');
        $alu->nascimento = $request->input('nascimento');
        $alu->rga = $request->input('rga');
        $alu->cpf = $request->input('cpf');
        $alu->rg = $request->input('rg');
        $alu->contato = $request->input('contato');
        $alu->endereco = $request->input('endereco');
        $alu->cidade = $request->input('cidade');
        $alu->cep = $request->input('cep');
        $alu->instituicao = $request->input('instituicao');
        $alu->campus = $request->input('campus');
        $alu->curso = $request->input('curso');
        $alu->semestre = $request->input('semestre');
        $alu->email = $request->input('email');
        $email =  $request->input('email');
        
        $id =  User::where('email', $email)->first()->id;

        $alu->user_id = $id;
        
        $alu->save();

        return "cadastro ok";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        //esta MERDA nao ta funcionando
        $aluno = Aluno::where('id', $id)->get();
         //pra pegar nome das colunas -  $colunas = new Aluno();
        // $colun = $colunas->getTableColumns();
        
        return view('aluno-id', compact('aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $alu = Aluno::find($id);
        if(isset($alu)) {
            return view('editaraluno', compact('alu'));
        }
        return redirect('/aluno-id');
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
        $alu = Aluno::find($id);
        if(isset($alu)) {
            $alu->nome = $request->input('nome');
            $alu->nascimento = $request->input('nascimento');
            $alu->rga = $request->input('rga');
            $alu->cpf = $request->input('cpf');
            $alu->rg = $request->input('rg');
            $alu->contato = $request->input('contato');
            $alu->endereco = $request->input('endereco');
            $alu->cidade = $request->input('cidade');
            $alu->cep = $request->input('cep');
            $alu->instituicao = $request->input('instituicao');
            $alu->campus = $request->input('campus');
            $alu->curso = $request->input('curso');
            $alu->semestre = $request->input('semestre');
            $alu->save();
        }
        return redirect('/alunos/show/{id}');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alu = Aluno::find($id);
        if (isset($alu)) {
            $alu->delete();
        }
        return redirect('/alunos');
    }
}
