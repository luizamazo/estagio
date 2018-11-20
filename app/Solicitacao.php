<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
   public function aluno(){
       return $this->belongsTo(Aluno::class, 'aluno_id');
   }

   public function vaga(){
    return $this->belongsTo(Vaga::class, 'vaga_id');
}
}
