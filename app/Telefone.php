<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $fillable = [
        'fixo', 'celular'
    ];

    public function aluno(){
        return $this->hasOne(Aluno::class);
    }

    public function coordenador(){
        return $this->hasOne(Coordenador::class);
    }

    public function supervisor(){
        return $this->hasOne(Supervisor::class);
    }
}
