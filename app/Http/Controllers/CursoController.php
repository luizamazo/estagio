<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Instituicao;


class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */

    public function __construct()
    {
        //dps coloco só pro adm acessar
        $this->middleware('auth');
    }
    
    public function index()
    {
       //$curso = Curso::all();
       $curso = Curso::with('instituicao')->get();
        return view('curso.cursos', compact('curso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inst = Instituicao::all();
        return view('curso.novocurso', compact('inst'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curso = new Curso();
        $curso->nome = $request->input('nome');
        $curso->inst_id = $request->input('instituicao');
        $curso->campus = $request->input('campus');
        $curso->save();

        return redirect('/cursos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
       
        $curso = Curso::where('id', $id)->get();
     
        return view('curso.curso-id', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $curso = Curso::find($id);
        if(isset($inst)) {
            return view('curso.editarcurso', compact('curso'));
        }
        return redirect('/curso-id');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $curso = Curso::find($id);
        if(isset($curso)) {
            $inst->nome = $request->input('nome');
            $inst->contato = $request->input('contato');
            $inst->email = $request->input('email');
            $inst->site = $request->input('site');
            $inst->tipo = $request->input('tipo');
            $inst->cnpj = $request->input('cnpj');
            $inst->endereco = $request->input('endereco');
            $inst->campus = $request->input('campus');
            $inst->save();
        }
        return redirect('/curso/show/{id}');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Curso::find($id);
        if (isset($curso)) {
            $curso->delete();
        }
        return redirect('/cursos');
    }
}
