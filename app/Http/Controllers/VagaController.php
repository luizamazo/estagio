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
    
    public function __construct()
    {
      
        $this->middleware('auth');
    }
    
    public function index()
    {
        $vaga = Vaga::all();
        $aluno = Aluno::where('id', Auth::id());
        return view('vagas.vagas', compact('vaga', 'aluno'));
    }

   
    public function create()
    {
        $coor = Coordenador::all();
        $super = Supervisor::all();
        $empr = Empresa::all();
        return view('vagas.novavaga', compact('super', 'empr', 'coor'));
    }

    
    public function store(Request $request)
    {

        $vaga = new Vaga();
        $target = $vaga->titulo = $request->input('titulo');
        $vaga->area = $request->input('area');
        $vaga->requisitos = $request->input('requisitos');
        $vaga->coor_id = $request->input('coordenador');
        $vaga->empresa_id = $request->input('empresa');
        $vaga->super_id = $request->input('supervisor');
        $vaga->save();

        $log = new Log();
        $log->log('criou', 'vaga', $target);

        return redirect('/vaga');
    }

 
    public function show($id)
    {  
       
        $vaga = Vaga::where('id', $id)->get();
     
        return view('vagas.vaga-id', compact('vaga'));
    }

   
    public function edit($id)
    {
        
        $vaga = Vaga::find($id);
        if(isset($vaga)) {
            return view('vagas.editarvaga', compact('vaga'));
        }
    }

    public function update(Request $request, $id)
    {
      
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
        return redirect('/home');
    }
}
