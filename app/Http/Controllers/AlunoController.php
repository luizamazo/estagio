<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;
use App\Aluno;
use App\Curso;
use App\Campus;
use App\Instituicao;
use App\Telefone;
use App\Endereco;
use App\User;
use App\Log;
use App\Contato;

class AlunoController extends Controller
{

    public function __construct()
    {
        //dpscoloco q é amdmin
        $this->middleware('auth');
    }
    
    public function index()
    {
        $alu = Aluno::all();
        return view('aluno.alunos', compact('alu'));
    }
   
    public function create()
    {
        $curso = Curso::all();
        $inst = Instituicao::all();
        $campus = Campus::all();
        return view('aluno.novoaluno', compact('curso', 'inst', 'campus'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'rua'=>'required',
            'bairro'=>'required',
            'cidade'=>'required',
            'cep'=>'required',
            'celular'=>'required',
            'cpf' => 'required',
            'rg'=>'required',
            'rga'=>'required',
            'email' => 'required|email|max:255|'
            ]); 
            

            $pessoa = new Pessoa();
            $target = $pessoa->nome = $request->input('nome');
            $pessoa->nascimento = $request->input('nascimento');
            $pessoa->rg = $request->input('rg');
            $cpf = $pessoa->cpf = $request->input('cpf');
            $email = $pessoa->email = $request->input('email');
            $id = User::where('email', $email)->first()->id;
            $pessoa->user_id = $id;

            $pessoa->save();

          /*  era pra cadastrar user pessoa e aluno ao mesmo tempo mas deu ruim numas coisa de auth
          $user = new User();

            $username = $request->input('username');
            $email = $request->input('email');
            $password = $request->input('password');
        
            $user->createUser($username, $email, $password, $id);
        */

            Telefone::create([
                "fixo"=>request('fixo'),
                "celular"=>request('celular')
            ]); 

            $end = new Endereco();
            $rua = $end->rua = $request->input('rua');
            $end->bairro = $request->input('bairro');
            $end->cidade = $request->input('cidade');
            $end->cep = $request->input('cep');
            $end->save();

            $p_id = Pessoa::where('cpf', $cpf)->first()->id;
            $e_id = Endereco::where('rua', $rua)->first()->id;
            $celular = $request->input('celular');
            $t_id = Telefone::where('celular', $celular)->first()->id;

            $alu = new Aluno();
            $alu->pessoa_id = $p_id;
            $alu->end_id = $e_id;
            $alu->tel_id = $t_id;
            $alu->inst_id = $request->input('instituicao');
            $alu->campus_id = $request->input('campus');
            $alu->curso_id = $request->input('curso');
            $alu->rga = $request->input('rga');
            $alu->semestre = $request->input('semestre');
            $alu->save();

            $log = new Log();
            $log->log('cadastrou', 'aluno', $target);

        return redirect('/aluno');
    }

    public function show($id)
    {  
       
        $aluno = Aluno::where('id', $id)->get();
        return view('aluno.aluno-id', compact('aluno'));
    }

    public function edit($id)
    {
        $inst = Instituicao::all();
        $campus = Campus::all();
        $curso = Curso::all();
        $alu = Aluno::find($id);
        if(isset($alu)) {
            return view('aluno.editaraluno', compact('alu', 'inst', 'campus', 'curso'));
        }
        return redirect('/aluno/{id}');
    }

    public function update(Request $request, $id)
    {
        $alu = Aluno::find($id);
        if(isset($alu)) {

            $target = $request->input('nome');
           
            //entro na tabela pessoa, busco o id dela q é igual ao id de pessoa_id dentro de aluno, update no nome apenas
            $alu->pessoa()->where('id', $alu->pessoa_id)->update(['nome'=> $request->input('nome')]);

            $alu->telefone()->where('id', $alu->tel_id)->update([
                'fixo' => $request->input('fixo'),
                'celular' => $request->input('celular')
                ]);

            $alu->endereco()->where('id', $alu->end_id)->update([
                'rua'=> $request->input('rua'),
                'bairro' => $request->input('bairro'),
                'cidade' => $request->input('cidade'),
                'cep' => $request->input('cep')
                ]);

            $alu->inst_id = $request->input('instituicao');
            $alu->campus_id = $request->input('campus');
            $alu->curso_id = $request->input('curso');
            $alu->semestre = $request->input('semestre');
            $alu->save();

            $log = new Log();
            $log->log('editou', 'aluno', $target);
        }
        return redirect('/aluno');
    }

    public function destroy($id)
    {
        //deleto pessoa, aluno, telefone e endereço, dps altero os ids de end e tel pra poder deletar cascada
        //user não é deletado quando aluno é deletado
        $end_id = Aluno::where('id', $id)->first()->end_id;
        $tel_id = Aluno::where('id', $id)->first()->tel_id;
        $pessoa_id = Aluno::where('id', $id)->first()->pessoa_id;
        $target = Pessoa::where('id', $pessoa_id)->first()->nome;
        
        $pessoa = Pessoa::find($pessoa_id);
        $pessoa->delete();

        $end = Endereco::find($end_id);
        $end->delete();

        $tel = Telefone::find($tel_id);
        $tel->delete();

        $log = new Log();
        $log->log('deletou', 'aluno', $target);
        
        return redirect('/aluno');
    }
}
