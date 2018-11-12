<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instituicao;
use App\Curso;

class InstituicaoController extends Controller
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
        $inst = Instituicao::all();
        return view('instituicao.instituicoes', compact('inst'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instituicao.novainstituicao');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inst = new Instituicao();
        $inst->nome = $request->input('nome');
        $inst->contato = $request->input('contato');
        $inst->email = $request->input('email');
        $inst->site = $request->input('site');
        $inst->tipo = $request->input('tipo');
        $inst->cnpj = $request->input('cnpj');
        $inst->endereco = $request->input('endereco');
        $inst->campus = $request->input('campus');
      
        $inst->save();

        return redirect('/instituicoes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
       
        $inst = Instituicao::where('id', $id)->get();
        $curso = Curso::where('inst_id', $id)->get();
        return view('instituicao.instituicao-id', compact('inst', 'curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $inst = Instituicao::find($id);
        if(isset($inst)) {
            return view('instituicao.editarinstituicao', compact('inst'));
        }
        return redirect('/instituicao-id');
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
        $inst = Instituicao::find($id);
        if(isset($inst)) {
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
        return redirect('/instituicao/show/{id}');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inst = Instituicao::find($id);
        if (isset($inst)) {
            $inst->delete();
        }
        return redirect('/instituicoes');
    }
}
