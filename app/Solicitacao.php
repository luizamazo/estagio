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

    public function supervisor(){
        return $this->belongsTo(Supervisor::class, 'super_id');
    }
    
    public function coordenador(){
        return $this->belongsTo(Coordenador::class, 'coor_id');
    }

    public function estagio(){
        return $this->hasOne(Estagio::class);
    }

}
