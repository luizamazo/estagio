<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{

    protected $fillable = [
        'nome', 'email', 'site', 'tipo', 'cnpj',
        'telefone', 'end_id'
    ];

    public function curso(){
        return $this->hasMany(Curso::class);
    }

    public function aluno(){
        return $this->hasMany(Aluno::class);
    }

    public function coordenador(){
        return $this->hasMany(Coordenador::class);
    }

    public function endereco(){
        return $this->belongsTo(Endereco::class, 'end_id');
    }

    public function campus(){
        return $this->hasMany(Campus::class);
    }
}
