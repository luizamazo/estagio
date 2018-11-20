<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Instituicao;
use App\Log;
use App\Campus;

class CursoController extends Controller
{
   

    public function __construct()
    {
      
        $this->middleware('auth');
    }
    
    public function index()
    {
      
       $curso = Curso::with('instituicao')->get();
        return view('curso.cursos', compact('curso'));
    }

    
    public function create()
    {
        $inst = Instituicao::all();
        $campus = Campus::all();
        return view('curso.novocurso', compact('inst', 'campus'));
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

        return redirect('/instituicao');
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
        return redirect('/instituicao');
    }
}
