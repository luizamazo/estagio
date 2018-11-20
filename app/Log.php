<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;


class Log extends Model
{
    public function log($action, $type, $target){
        $log = new Log();

        $log->autor = Auth::user()->name;
        $log->acao = $action;
        $log->tipo = $type;
        $log->alvo = $target;
        $log->save();
    }
}
