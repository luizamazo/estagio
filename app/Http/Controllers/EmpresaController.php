<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Log;
use Response;
use App\Endereco;

class EmpresaController extends Controller
{
    
    public function index()
    {
        $empresas = Empresa::with('endereco')->get();
        return Response::json([
            'empresas' => $empresas
        ], 200);
    }

  
    public function create()
    {
      
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

        return Response::json([
            'msg' => 'deu bom'
        ], 201);
    }

 
    public function show($id)
    {  
       
       // $empresa = Empresa::where('id', $id)->get();
       $empresa = Empresa::where('id', $id)->with('endereco')->get();
       
       return Response::json([
        'empresa' => $empresa
     ], 201);

    }

  
    public function edit($id)
    {
        
       /* $empr = Empresa::find($id);
        if(isset($empr)) {
            return view('empresa.editarempresa', compact('empr'));
        }
        return redirect('/empresa-id');
        */
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

        return Response::json([
            'msg' => 'update ok'
         ], 201);
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
        
       return Response::json([
            'msg' => 'deletado ok'
         ], 201);
    }
}
