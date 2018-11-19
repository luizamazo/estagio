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

class SupervisorController extends Controller
{
 

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $super = Supervisor::all();
        return view('supervisor.supervisores', compact('super'));
    }

 
    public function create()
    {
        $empresa = Empresa::all();
        return view('supervisor.novosupervisor', compact('empresa'));
    }

  
    public function store(Request $request)
    {
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

        return redirect('/supervisor');
    }

  
    public function show($id)
    {  
       
        $super = Supervisor::where('id', $id)->get();
     
        return view('supervisor.supervisor-id', compact('super'));
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
        $target = $request->input('nome');
        $super = Supervisor::find($id);
        if(isset($super)) {
            $super->pessoa()->where('id', $super->pessoa_id)->update(['nome'=> $request->input('nome')]);
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
        return redirect('/supervisor');
    }


    public function destroy($id)
    {
        $tel_id = Supervisor::where('id', $id)->first()->tel_id;
        $pessoa_id = Supervisor::where('id', $id)->first()->pessoa_id;
        $target = Pessoa::where('id', $pessoa_id)->first()->nome;
        
        $pessoa = Pessoa::find($pessoa_id);
        $pessoa->delete();

        $tel = Telefone::find($tel_id);
        $tel->delete();

        $log = new Log();
        $log->log('deletou', 'supervisor', $target);
    
        return redirect('/supervisor');
    }
}
