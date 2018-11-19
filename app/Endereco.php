<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{

    protected $fillable = [
        'rua', 'bairro', 'cidade', 'cep'
    ];

    public function aluno(){
        return $this->hasOne(Aluno::class);
    }

    public function instituicao(){
        return $this->hasOne(Instituicao::class);
    }

    public function empresa(){
        return $this->hasOne(Empresa::class);
    }

}
