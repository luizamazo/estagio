<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\User;
use App\Coordenador;

class CoordenadorController extends Controller
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
        $cord = Coordenador::all();
        return view('coordenador.coordenadores', compact('cord'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coordenador.novocoordenador');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cord = new Coordenador();
        $cord->nome = $request->input('nome');
        $cord->nascimento = $request->input('nascimento');
        $cord->cpf = $request->input('cpf');
        $cord->rg = $request->input('rg');
        $cord->contato = $request->input('contato');
        $cord->instituicao = $request->input('instituicao');
        $cord->campus = $request->input('campus');
        $cord->curso = $request->input('curso');
        $cord->cargo = $request->input('cargo');
        $cord->siape = $request->input('siape');
        $cord->email = $request->input('email');
        $email =  $request->input('email');
        
        $id =  User::where('email', $email)->first()->id;

        $cord->user_id = $id;
        
        $cord->save();

        return "cadastro coord ok";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
       
        $cord = Coordenador::where('id', $id)->get();
     
        return view('coordenador.coordenador-id', compact('cord'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $cord = Coordenador::find($id);
        if(isset($cord)) {
            return view('coordenador.editarcoordenador', compact('cord'));
        }
        return redirect('/coordenador-id');
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
        $cord = Coordenador::find($id);
        if(isset($cord)) {
            $cord->nome = $request->input('nome');
            $cord->nascimento = $request->input('nascimento');
            $cord->cpf = $request->input('cpf');
            $cord->rg = $request->input('rg');
            $cord->contato = $request->input('contato');
            $cord->instituicao = $request->input('instituicao');
            $cord->campus = $request->input('campus');
            $cord->curso = $request->input('curso');
            $cord->cargo = $request->input('cargo');
            $cord->siape = $request->input('siape');
            $cord->save();
        }
        return redirect('/coordenador/show/{id}');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cord = Coordenador::find($id);
        if (isset($cord)) {
            $cord->delete();
        }
        return redirect('/coordenadores');
    }
}
