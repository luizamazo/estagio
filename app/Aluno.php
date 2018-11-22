<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{

    protected $fillable = [
        'rga', 'semestre', 'tel_id', 'pessoa_id', 'inst_id',
        'campus_id', 'curso_id', 'end_id'
    ];

      
    public function pessoa(){
        return $this->belongsTo(Pessoa::class, 'pessoa_id');
    }
    
    public function telefone(){
        return $this->belongsTo(Telefone::class, 'tel_id');
    }

    public function endereco(){
        return $this->belongsTo(Endereco::class, 'end_id');
    }
  
    public function instituicao(){
        return $this->belongsTo(Instituicao::class, 'inst_id');
    }

    public function campus(){
        return $this->belongsTo(Campus::class, 'campus_id');
    }

    public function curso(){
        return $this->belongsTo(Curso::class, 'curso_id');
    }
    //////////////////////////////

    public function solicitacao(){
        return $this->hasOne(Solicitacao::class);
    }
}
