<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\User;
use App\Log;
use App\Contato;

class AlunoController extends Controller
{

    public function __construct()
    {
        //dps coloco só pro adm acessar
        $this->middleware('auth');
    }
    
    public function index()
    {
        $alu = Aluno::all();
        return view('aluno.alunos', compact('alu'));
    }
   
    public function create()
    {
        return view('aluno.novoaluno');
    }
    
    public function store(Request $request)
    {
        $alu = new Aluno();
        $target = $alu->nome = $request->input('nome');
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
        $email = $alu->email = $request->input('email');

        $id =  User::where('email', $email)->first()->id;

        $alu->user_id = $id;
        
        $alu->save();

        $log = new Log();
        $log->log('cadastrou', 'aluno', $target);

        return redirect('/alunos');
    }

    public function show($id)
    {  
        //esta MERDA nao ta funcionando
        $aluno = Aluno::where('id', $id)->get();
         //pra pegar nome das colunas -  $colunas = new Aluno();
        // $colun = $colunas->getTableColumns();
        
        return view('aluno.aluno-id', compact('aluno'));
    }

    public function edit($id)
    {
        
        $alu = Aluno::find($id);
        if(isset($alu)) {
            return view('aluno.editaraluno', compact('alu'));
        }
        return redirect('/aluno-id');
    }

    public function update(Request $request, $id)
    {
        $alu = Aluno::find($id);
        if(isset($alu)) {
            $target = $alu->nome = $request->input('nome');
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

            $log = new Log();
            $log->log('editou', 'aluno', $target);
        }
        return redirect('/alunos/show/{id}');
    }

    public function destroy($id)
    {
        $alu = Aluno::find($id);
        if (isset($alu)) {
            $alu->delete();
            $log = new Log();
            $target = $alu->nome;
            $log->log('deletou', 'aluno', $target);
        }
        return redirect('/alunos');
    }
}
