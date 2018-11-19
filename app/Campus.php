<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $fillable = [
        'nome', 'inst_id'
    ];

    public function instituicao(){
        return $this->belongsTo(Instituicao::class, 'inst_id');
    }

    public function aluno(){
        return $this->hasMany(Aluno::class);
    }

    public function coordenador(){
        return $this->hasMany(Coordenador::class);
    }
}
