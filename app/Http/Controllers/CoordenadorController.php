<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Response;
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
    
    public function index()
    {
        $coordenadores = Coordenador::with('pessoa', 'telefone', 'instituicao', 'campus', 'curso')->get();
        return Response::json([
            'coordenadores' => $coordenadores
        ], 200);
    }

    public function create()
    {
        $cursos = Curso::all();
        $instituicoes = Instituicao::all();
        $campuses = Campus::all();

        return Response::json([
            'cursos' => $cursos, 
            'instituicoes' => $instituicoes,
            'campuses' => $campuses
        ], 201);
    }

    public function store(Request $request, $role)
    {   
            $role = $request->input('role');
            
            app('App\Http\Controllers\UserController')->register($request, $role);

            $this->validate($request, [
                'nome' => 'required',
                'nascimento' => 'required',
                'celular'=>'required',
                'cpf' => 'required',
                'rg'=>'required',
                'siape'=>'required',
                'cargo' => 'required',
                'curso' => 'required',
                'email' => 'required|email|unique:pessoas',
                'instituicao' => 'required'
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

            return Response::json([
                'msg' => 'deu bom'
            ], 201);
    }

   
    public function show($id)
    {  
        $coordenador = Coordenador::where('id', $id)->with('pessoa', 'telefone', 'instituicao', 'campus', 'curso')->get();
        return Response::json([
           'coordenador' => $coordenador
        ], 201);
       
    }

   
    public function edit($id)
    {
        $cursos = Curso::all();
        $instituicoes = Instituicao::all();
        $campuses = Campus::all();
        $coordenador = Coordenador::find($id);
        
    
        return Response::json([
            'cursos' => $cursos, 
            'instituicoes' => $instituicoes,
            'campuses' => $campuses,
            'coordenador' => $coordenador
        ], 201);
        
       
    }

    public function update(Request $request, $id)
    {
        
        $cord = Coordenador::find($id);
        if(isset($cord)) {
            $target = $cord->pessoa()->where('id', $cord->pessoa_id)->get()->first()->nome;
               
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

        return Response::json([
            'msg' => 'update ok'
         ], 201);
    }

  
    public function destroy($id)
    {

        $tel_id = Coordenador::where('id', $id)->first()->tel_id;
        $pessoa_id = Coordenador::where('id', $id)->first()->pessoa_id;
        $user_id = Pessoa::where('id', $pessoa_id)->first()->user_id;
        $target = Pessoa::where('id', $pessoa_id)->first()->nome;
        
        $pessoa = Pessoa::find($pessoa_id);
        $pessoa->delete();

        $tel = Telefone::find($tel_id);
        $tel->delete();

        $user = User::find($user_id);
        $user->delete();

        $log = new Log();
        $log->log('deletou', 'coordenador', $target);

        return Response::json([
            'msg' => 'deletado ok'
         ], 201);
    }
}
