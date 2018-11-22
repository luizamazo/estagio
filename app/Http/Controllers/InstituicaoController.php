<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instituicao;
use App\Curso;
use App\Endereco;
use App\Campus;
use Response;
use App\Log;

class InstituicaoController extends Controller
{
    
    public function index()
    {
        $instituicoes = Instituicao::with('endereco')->get();
        
        return Response::json([
            'instituicoes' => $instituicoes
        ], 200);
    }

 
    public function create()
    {
        $campuses = Campus::all();

        return Response::json([
            'campuses' => $campuses
        ]);
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
        $inst = new Instituicao();
        $target = $inst->nome = $request->input('nome');
        $inst->telefone = $request->input('contato');
        $inst->email = $request->input('email');
        $inst->site = $request->input('site');
        $inst->tipo = $request->input('tipo');
        $inst->end_id = $e_id;
        $cnpj = $inst->cnpj = $request->input('cnpj');
        $inst->save();

        $i_id = Instituicao::where('cnpj', $cnpj)->first()->id;
        $campus_id = $request->input('campus');

        //AGORINHA ARRUMO ISSO
        $campus = new Campus();
            $campus->nome = 
            $campus->inst_id = $i_id;
            $campus->save();

        $log = new Log();
        $log->log('criou', 'instituição', $target);

        return Response::json([
            'msg' => 'deu bom'
        ], 201);
    }

    public function show($id)
    {  
        /*
        $inst = Instituicao::where('id', $id)->get();
        $curso = Curso::where('inst_id', $id)->get();
        */
        $campus = Campus::where('inst_id', $id)->first()->nome;
        $instituicao = Instituicao::where('id', $id)->with('endereco')->get();
        $cursos = Curso::where('inst_id', $id)->get();

        return Response::json([
           'instituicao' => $instituicao,
           'campus' => $campus,
           'cursos' => $cursos
        ], 201);
       
    }

    public function edit($id)
    {
        
        
    }


  
    public function update(Request $request, $id)
    {
        $inst = Instituicao::find($id);
        if(isset($inst)) {
            $target = Instituicao::where('id', $id)->get()->first()->nome;
            $inst->telefone = $request->input('contato');
            $inst->email = $request->input('email');
            $inst->site = $request->input('site');
            $inst->endereco()->where('id', $inst->end_id)->update([
                'rua'=> $request->input('rua'),
                'bairro' => $request->input('bairro'),
                'cidade' => $request->input('cidade'),
                'cep' => $request->input('cep')
                ]);

            $inst->save();

            $log = new Log();
            $log->log('editou', 'instituição', $target);
        }
        
        return Response::json([
            'msg' => 'update ok'
         ], 201);
    }

 
    public function destroy($id)
    {   
        $end_id = Instituicao::where('id', $id)->first()->end_id;
        $end = Endereco::find($end_id);
        $end->delete();

        $inst = Instituicao::find($id);
        if (isset($inst)) {
            $target = $inst->nome;
            $inst->delete();
            $log = new Log();
            $log->log('deletou', 'instituição', $target);
        }

        return Response::json([
            'msg' => 'deletado ok'
         ], 201);
    }

    public function storeCampus(Request $request){
    
        $campus = new Campus();
        $target = $campus->nome = $request->input('nome');
        $campus->inst_id = $request->input('instituicao');
        $campus->save();

        $log = new Log();
     //   $log->log('cadastrou', 'campus', $target);
        
            return Response::json([
                'msg' => 'cadastrado campus ok'
             ], 201);

    }
}
