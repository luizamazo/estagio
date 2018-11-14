<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    public function aluno(){
        return $this->belongsTo(Aluno::class, 'aluno_id');
    }

    public function coordenador(){
        return $this->belongsTo(Coordenador::class, 'coord_id');
    }

    public function supervisor(){
        return $this->belongsTo(Supervisor::class, 'super_id');
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function instituicao(){
        return $this->belongsTo(Instituicao::class, 'inst_id');
    }

}