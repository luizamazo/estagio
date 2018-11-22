<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\Empresa;
use App\User;
use App\Supervisor;
use App\Log;
use App\Pessoa;
use App\Telefone;
use Response;

class SupervisorController extends Controller
{

    public function index()
    {
        $supervisores = Supervisor::with('pessoa', 'telefone', 'empresa')->get();
        return Response::json([
            'supervisores' => $supervisores
        ], 200);
    }

 
    public function create()
    {
        $empresas = Empresa::all();

        return Response::json([
            'empresas' => $empresas         
        ], 201);
    }

  
    public function store(Request $request)
    {
        $role = $request->input('role');
            
        app('App\Http\Controllers\UserController')->register($request, $role);

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

        $super = new Supervisor();
        $super->pessoa_id = $p_id;
        $super->tel_id = $t_id;
        $super->empresa_id = $request->input('empresa');
        $super->cargo = $request->input('cargo');
        $super->area = $request->input('area');
        $super->save();

        $log = new Log();
        $log->log('criou', 'supervisor', $target);

        return Response::json([
            'msg' => 'deu bom'
        ], 201);
    }

  
    public function show($id)
    {  
       
        $supervisor = Supervisor::where('id', $id)->with('pessoa', 'telefone', 'empresa')->get();
        return Response::json([
           'supervisor' => $supervisor
        ], 201);
    }

   
    public function edit($id)
    {
        
        $super = Supervisor::find($id);
        $empresa = Empresa::all();
        if(isset($super)) {
            return view('supervisor.editarsupervisor', compact('super', 'empresa'));
        }
    }

    public function update(Request $request, $id)
    {   
  
        $super = Supervisor::find($id);

        if(isset($super)) {
            $target = $super->pessoa()->where('id', $super->pessoa_id)->get()->first()->nome;

            $super->telefone()->where('id', $super->tel_id)->update([
                'fixo' => $request->input('fixo'),
                'celular' => $request->input('celular')
                ]);
        
            $super->empresa_id = $request->input('empresa');
            $super->cargo = $request->input('cargo');
            $super->area = $request->input('area');
            $super->save();

            $log = new Log();
            $log->log('editou', 'supervisor', $target);
        }

        return Response::json([
            'msg' => 'update ok'
         ], 201);
    }


    public function destroy($id)
    {
        $tel_id = Supervisor::where('id', $id)->first()->tel_id;
        $pessoa_id = Supervisor::where('id', $id)->first()->pessoa_id;
        $user_id = Pessoa::where('id', $pessoa_id)->first()->user_id;
        $target = Pessoa::where('id', $pessoa_id)->first()->nome;
        
        $pessoa = Pessoa::find($pessoa_id);
        $pessoa->delete();

        $tel = Telefone::find($tel_id);
        $tel->delete();

        $user = User::find($user_id);
        $user->delete();

        $log = new Log();
        $log->log('deletou', 'supervisor', $target);

        return Response::json([
            'msg' => 'deletado ok'
         ], 201);
    
    }
    
}
