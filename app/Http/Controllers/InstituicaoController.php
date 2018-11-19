<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instituicao;
use App\Curso;
use App\Endereco;
use App\Campus;
use App\Log;

class InstituicaoController extends Controller
{
 
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

 
    public function create()
    {
        return view('instituicao.novainstituicao');
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
        $campus = new Campus();
            $campus->nome = $request->input('campus');
            $campus->inst_id = $i_id;
            $campus->save();

        $log = new Log();
        $log->log('criou', 'instituição', $target);

        return redirect('/instituicao');
    }

    public function show($id)
    {  
        $campus = Campus::where('inst_id', $id)->first()->nome;
        $inst = Instituicao::where('id', $id)->get();
        $curso = Curso::where('inst_id', $id)->get();
        return view('instituicao.instituicao-id', compact('inst', 'curso', 'campus'));
    }

    public function edit($id)
    {
        
        $inst = Instituicao::find($id);
        if(isset($inst)) {
            return view('instituicao.editarinstituicao', compact('inst'));
        }
    }


  
    public function update(Request $request, $id)
    {
        $inst = Instituicao::find($id);
        if(isset($inst)) {
            $target = $inst->nome = $request->input('nome');
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
        return redirect('/instituicao');
    }

 
    public function destroy($id)
    {   
        $end_id = Instituicao::where('id', $id)->first()->end_id;

        $end = Endereco::find($end_id);
        $end->delete();

        $inst = Instituicao::find($id);
        if (isset($inst)) {
            //logica ta certa mas acho q nao ta indo? vejo depois
            $target = $inst->nome;
            $inst->delete();
            $log = new Log();
            $log->log('deletou', 'instituição', $target);
        }
        return redirect('/instituicao');
    }
}
