<?php

namespace App\Http\Controllers;

use App\Estagio;
use Response;
use App\Frequencia;
use App\Solicitacao;
use Illuminate\Http\Request;

class EstagioController extends Controller
{
  
    public function index()
    {
        //
    }

   
    public function create()
    {
        //
    }

  
    public function store(Request $request, $id)
    {
        $estagio = new Estagio();
        $estagio->soli_id = $request->input('soli_id');
        $estagio->status = 'EM ANDAMENTO';
        $estagio->save();
        //$est_id = Estagio::where('status', 'EM ANDAMENTO')->get()->first()->id;  
        return Response::json([
            'msg' => 'estagio ok'
        ]);
    }

  
    public function show($id)
    {
        $soli_id = Solicitacao::where('aluno_id', $id)->get()->first()->id;
        $estagio = Estagio::where('soli_id', $soli_id)
        ->with('solicitacao')
        ->get();

        $status = Estagio::where('soli_id', $soli_id)->get()->first()->status;
        
    return Response::json([
        'estagio' => $estagio
    ]);
    }

   
    public function edit(Estagio $estagio)
    {
        //
    }

    public function update(Request $request, Estagio $estagio)
    {
        //
    }

   
    public function destroy(Estagio $estagio)
    {
        //
    }
}
