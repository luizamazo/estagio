<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Aluno;
use App\Vaga;
use App\Supervisor;
use App\Empresa;
use App\Log;
use App\Coordenador;
use App\Pessoa;
use Auth;
use Response;

class VagaController extends Controller
{
    
    public function index()
    {
       
       // pra q isso? $aluno = Aluno::where('id', Auth::id());
       $vagas = Vaga::with('empresa', 'coordenador', 'supervisor')->get();
      
       return Response::json([
           'vagas' => $vagas,
       
       ], 200);
    }

   
    public function create()
    {
    
        $supervisores = Supervisor::with('pessoa')->get();
        $empresas = Empresa::all();

        return Response::json([
            'supervisores' => $supervisores, 
            'empresas' => $empresas
        ], 201);
    }

    
    public function store(Request $request)
    { 
        $user_id =  $request->input('coordenador');
        $p_id = Pessoa::where('user_id', $user_id)->first()->id;
        $c_id = Coordenador::where('pessoa_id', $p_id)->first()->id;
        $responsavel = Pessoa::where('id', $p_id)->first()->nome;

        $vaga = new Vaga();
        $target = $vaga->titulo = $request->input('titulo');
        $vaga->area = $request->input('area');
        $vaga->requisitos = $request->input('requisitos');
        $vaga->coor_id = $c_id;
        $vaga->empresa_id = $request->input('empresa');
        $vaga->super_id = $request->input('supervisor');
        $vaga->responsavel = $responsavel;
        $vaga->save();

        $log = new Log();
        $log->log('criou', 'vaga', $target);

        return Response::json([
            'msg' => 'deu bom'
        ], 201);
    }

 
    public function show($id)
    {  
       
        /*$vaga = Vaga::where('id', $id)->get();
     
        return view('vagas.vaga-id', compact('vaga')); */
    }

   
    public function edit($id)
    {
        
       
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
            $target = $vaga->titulo;
            $log->log('deletou', 'vaga', $target);
        }
        
        return Response::json([
            'msg' => 'deletado ok'
         ], 201);
    }
}
