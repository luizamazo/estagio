<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Telefone;
use App\Aluno;
use App\User;
use App\Curso;
use App\Instituicao;
use App\Campus;
use App\Coordenador;
use App\Log;
use App\Pessoa;

class CoordenadorController extends Controller
{
    
    public function __construct()
    {
        //dps coloco só pro adm acessar
        $this->middleware('auth');
    }
    
    public function index()
    {
        $cord = Coordenador::all();
        return view('coordenador.coordenadores', compact('cord'));
    }

    public function create()
    {
        $curso = Curso::all();
        $inst = Instituicao::all();
        $campus = Campus::all();
        return view('coordenador.novocoordenador', compact('inst', 'curso', 'campus'));
    }

    public function store(Request $request)
    {

       
       //posso fazer função pra inserir pessoa depois
            $pessoa = new Pessoa();
            $target = $pessoa->nome = $request->input('nome');
            $pessoa->nascimento = $request->input('nascimento');
            $pessoa->rg = $request->input('rg');
            $cpf = $pessoa->cpf = $request->input('cpf');
            $email = $pessoa->email = $request->input('email');
            $id = User::where('email', $email)->first()->id;
            $pessoa->user_id = $id;
            $pessoa->save();

            Telefone::create([
                "fixo"=>request('fixo'),
                "celular"=>request('celular')
            ]); 

            $p_id = Pessoa::where('cpf', $cpf)->first()->id;
            $celular = $request->input('celular');
            $t_id = Telefone::where('celular', $celular)->first()->id;

            $coor = new Coordenador();
            $coor->pessoa_id = $p_id;
            $coor->tel_id = $t_id;
            $coor->inst_id = $request->input('instituicao');
            $coor->campus_id = $request->input('campus');
            $coor->curso_id = $request->input('curso');
            $coor->siape = $request->input('siape');
            $coor->cargo = $request->input('cargo');
            $coor->save();

        
            $log = new Log();
            $log->log('cadastrou', 'coordenador', $target);

            return redirect('/coordenador');
    }

   
    public function show($id)
    {  
        $coor = Coordenador::where('id', $id)->get();
        return view('coordenador.coordenador-id', compact('coor'));
       
    }

   
    public function edit($id)
    {
        $inst = Instituicao::all();
        $curso = Curso::all();
        $campus = Campus::all();
        $cord = Coordenador::find($id);
        if(isset($cord)) {
            return view('coordenador.editarcoordenador', compact('cord', 'campus', 'curso', 'inst'));
        }
    }


  
    public function update(Request $request, $id)
    {
        $target = $request->input('nome');
        $cord = Coordenador::find($id);
        if(isset($cord)) {
            $cord->pessoa()->where('id', $cord->pessoa_id)->update(['nome'=> $request->input('nome')]);
            $cord->telefone()->where('id', $cord->tel_id)->update([
                'fixo' => $request->input('fixo'),
                'celular' => $request->input('celular')
                ]);
        
            $cord->inst_id = $request->input('instituicao');
            $cord->campus_id = $request->input('campus');
            $cord->curso_id = $request->input('curso');
            $cord->cargo = $request->input('cargo');
            $cord->siape = $request->input('siape');
            $cord->save();

            $log = new Log();
            $log->log('editou', 'coordenador', $target);
        }
        return redirect('/coordenador');
    }

  
    public function destroy($id)
    {

        $tel_id = Coordenador::where('id', $id)->first()->tel_id;
        $pessoa_id = Coordenador::where('id', $id)->first()->pessoa_id;
        $target = Pessoa::where('id', $pessoa_id)->first()->nome;
        
        $pessoa = Pessoa::find($pessoa_id);
        $pessoa->delete();

        $tel = Telefone::find($tel_id);
        $tel->delete();

        $log = new Log();
        $log->log('deletou', 'coordenador', $target);
    
        return redirect('/coordenador');
    }
}
