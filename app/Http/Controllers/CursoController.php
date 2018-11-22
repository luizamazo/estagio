<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use Response;
use App\Instituicao;
use App\Log;
use App\Campus;

class CursoController extends Controller
{
   
    public function index()
    {
      
       $cursos = Curso::with('instituicao', 'campus')->get();
        return Response::json([
            'instituicoes' => $instituicoes
        ], 200);
    }

    
    public function create()
    {
        $instituicoes = Instituicao::all();
        $campuses = Campus::all();

        return Response::json([
            'instituicoes' => $instituicoes,
            'campuses' => $campuses
        ], 201);
    }

  
    public function store(Request $request)
    {
        $curso = new Curso();
        $target = $curso->nome = $request->input('nome');
        $curso->inst_id = $request->input('instituicao');
        $curso->campus_id = $request->input('campus');
        $curso->save();

        $log = new Log();
        $log->log('criou', 'curso', $target);

        return Response::json([
            'msg' => 'deu bom'
        ], 201);
    }

   
    public function destroy($id)
    {
        $curso = Curso::find($id);
        if (isset($curso)) {
            $curso->delete();
            $log = new Log();
            $target = $curso->nome;
            $log->log('deletou', 'curso', $target);
        }
        
        return Response::json([
            'msg' => 'deletado ok'
         ], 201);
    }
}
