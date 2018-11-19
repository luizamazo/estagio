<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nome', 'ramo', 'cnpj', 'telefone', 'representante', 'end_id'
    ];
   
    public function supervisor(){
        return $this->hasMany(Supervisor::class);
    }

    public function vaga(){
        return $this->hasMany(Vaga::class);
    }

    public function endereco(){
        return $this->belongsTo(Endereco::class, 'end_id');
    }
}
