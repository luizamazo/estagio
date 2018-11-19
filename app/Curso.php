<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'nome', 'inst_id', 'campus_id'
    ];

    public function instituicao(){
        return $this->belongsTo(Instituicao::class, 'inst_id');
    }

    public function campus(){
        return $this->belongsTo(Campus::class, 'campus_id');
    }

    public function aluno(){
        return $this->hasMany(Aluno::class);
    }

    public function coordenador(){
        return $this->hasMany(Aluno::class);
    }
}
