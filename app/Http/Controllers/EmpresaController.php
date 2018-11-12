<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class EmpresaController extends Controller
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
        $empr = Empresa::all();
        return view('empresa.empresas', compact('empr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.novaempresa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empr = new Empresa();
        $empr->razao_social = $request->input('razaoSocial');
        $empr->ramo = $request->input('ramo');
        $empr->cnpj = $request->input('cnpj');
        $empr->endereco = $request->input('endereco');
        $empr->contato = $request->input('contato');
        $empr->representante = $request->input('representante');
        $empr->save();

        return redirect('/empresas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
       
        $empr = Empresa::where('id', $id)->get();
     
        return view('empresa.empresa-id', compact('empr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $empr = Empresa::find($id);
        if(isset($empr)) {
            return view('empresa.editarempresa', compact('empr'));
        }
        return redirect('/empresa-id');
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
        $empr = Empresa::find($id);
        if(isset($empr)) {
            $empr->razao_social = $request->input('razaoSocial');
            $empr->ramo = $request->input('ramo');
            $empr->cnpj = $request->input('cnpj');
            $empr->endereco = $request->input('endereco');
            $empr->contato = $request->input('contato');
            $empr->representante = $request->input('representante');
            $empr->save();
        }
        return redirect('/empresas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empr = Empresa::find($id);
        if (isset($empr)) {
            $empr->delete();
        }
        return redirect('/empresas');
    }
}
