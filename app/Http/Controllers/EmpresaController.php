<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Log;
use App\Endereco;

class EmpresaController extends Controller
{
    

    public function __construct()
    {
         
        $this->middleware('auth');
    }
    
    public function index()
    {
        $empr = Empresa::all();
        return view('empresa.empresas', compact('empr'));
    }

  
    public function create()
    {
        return view('empresa.novaempresa');
    }

    
    public function store(Request $request)
    {
    
        $end = new Endereco();
            $rua = $end->rua = $request->input('rua');
            $end->bairro = $request->input('bairro');
            $end->cidade = $request->input('cidade');
            $end->cep = $request->input('cep');
            $end->save();


        $e_id = Endereco::where('rua', $rua)->first()->id;

        $empr = new Empresa();
        $target = $empr->nome = $request->input('razaoSocial');
        $empr->ramo = $request->input('ramo');
        $empr->cnpj = $request->input('cnpj');
        $empr->telefone = $request->input('contato');
        $empr->site = $request->input('site');
        $empr->email = $request->input('email');
        $empr->representante = $request->input('representante');
        $empr->end_id = $e_id;
        $empr->save();

        $log = new Log();
        $log->log('criou', 'empresa', $target);

        return redirect('/empresa');
    }

 
    public function show($id)
    {  
       
        $empr = Empresa::where('id', $id)->get();
     
        return view('empresa.empresa-id', compact('empr'));
    }

  
    public function edit($id)
    {
        
        $empr = Empresa::find($id);
        if(isset($empr)) {
            return view('empresa.editarempresa', compact('empr'));
        }
        return redirect('/empresa-id');
    }


    
    public function update(Request $request, $id)
    {
        $empr = Empresa::find($id);
        if(isset($empr)) {
            $target = $empr->nome = $request->input('razaoSocial');
            $empr->ramo = $request->input('ramo');
            
            $empr->endereco()->where('id', $empr->end_id)->update([
                'rua'=> $request->input('rua'),
                'bairro' => $request->input('bairro'),
                'cidade' => $request->input('cidade'),
                'cep' => $request->input('cep')
                ]);

            $empr->site = $request->input('site');
            $empr->telefone = $request->input('contato');
            $empr->email = $request->input('email');
            $empr->representante = $request->input('representante');
            $empr->save();

            $log = new Log();
            $log->log('editou', 'empresa', $target);
        }
        return redirect('/empresa');
    }

    
    public function destroy($id)
    {
        $end_id = Empresa::where('id', $id)->first()->end_id;
        $empr = Empresa::find($id);
        if (isset($empr)) {
            $end = Endereco::find($end_id);
            $end->delete();
            $empr->delete();
            $log = new Log();
            $target = $empr->nome;
            $log->log('deletou', 'empresa', $target);
        }
        return redirect('/empresa');
    }
}
