<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estagio extends Model
{
    public function solicitacao(){
        return $this->belongsTo(Solicitacao::class, 'soli_id');
    }
}
