<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campus;
use App\Instituicao;
use App\Log;

class InterController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');

    }
    public function create() 
    {
        return view('inter');
    }

    public function link(Request $request){
        
        $role = $request->input('role');

        if($role == 1){
            return redirect('/aluno/create');
        }else if($role == 2){
            return redirect('/supervisor/create');
        }else{
            return redirect('/coordenador/create');
        }
    }

    public function campus(){
    
        $inst = Instituicao::all();
        return view('campus', compact('inst'));

    }

    public function store(Request $request){
    
        $campus = new Campus();
        $target = $campus->nome = $request->input('nome');
        $campus->inst_id = $request->input('instituicao');
        $campus->save();

        $log = new Log();
            $log->log('cadastrou', 'campus', $target);
        
        redirect('/instituicao');

    }
}
