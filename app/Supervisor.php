<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $fillable = [
        'cargo', 'area', 'tel_id', 'pessoa_id', 'empresa_id'
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function pessoa(){
        return $this->belongsTo(Pessoa::class, 'pessoa_id');
    }

    public function telefone(){
        return $this->belongsTo(Telefone::class, 'tel_id');
    }

    public function vaga(){
        return $this->hasOne(Vaga::class);
    }

    public function solicitacao(){
        return $this->hasOne(Solicitacao::class);
    }

}
