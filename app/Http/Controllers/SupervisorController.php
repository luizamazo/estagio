<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\User;
use App\Supervisor;

class SupervisorController extends Controller
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
        $super = Supervisor::all();
        return view('supervisor.supervisores', compact('super'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supervisor.novosupervisor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $super = new Supervisor();
        $super->nome = $request->input('nome');
        $super->nascimento = $request->input('nascimento');
        $super->cpf = $request->input('cpf');
        $super->rg = $request->input('rg');
        $super->contato = $request->input('contato');
        $super->empresa = $request->input('empresa');
        $super->cargo = $request->input('cargo');
        $super->area = $request->input('area');
        $super->email = $request->input('email');
        $email =  $request->input('email');
        
        $id =  User::where('email', $email)->first()->id;

        $super->user_id = $id;
        
        $super->save();

        return "cadastro super ok";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
       
        $super = Supervisor::where('id', $id)->get();
     
        return view('supervisor.supervisor-id', compact('super'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $super = Supervisor::find($id);
        if(isset($super)) {
            return view('supervisor.editarsupervisor', compact('super'));
        }
        return redirect('/supervisor-id');
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
        $super = Supervisor::find($id);
        if(isset($super)) {
            $super->nome = $request->input('nome');
            $super->nascimento = $request->input('nascimento');
            $super->cpf = $request->input('cpf');
            $super->rg = $request->input('rg');
            $super->contato = $request->input('contato');
            $super->empresa = $request->input('empresa');
            $super->cargo = $request->input('cargo');
            $super->area = $request->input('area');
            $super->save();
        }
        return redirect('/supervisor/show/{id}');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $super = Supervisor::find($id);
        if (isset($super)) {
            $super->delete();
        }
        return redirect('/supervisores');
    }
}
