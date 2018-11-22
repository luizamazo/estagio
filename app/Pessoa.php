<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = [
        'nome', 'nascimento', 'rg', 'cpf', 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function coordenador(){
        return $this->hasOne(Coordenador::class);
    }

    public function supervisor(){
        return $this->hasOne(Supervisor::class);
    }

    public function aluno(){
        return $this->hasOne(Aluno::class);
    }

}
