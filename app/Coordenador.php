<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordenador extends Model
{
    protected $fillable = [
        'cargo', 'siape', 'tel_id', 'pessoa_id', 'inst_id',
        'campus_id', 'curso_id'
    ];

    public function user(){
        return $this->hasOne('App\User');
    }

    public function pessoa(){
        return $this->belongsTo(Pessoa::class, 'pessoa_id');
    }

    public function telefone(){
        return $this->belongsTo(Telefone::class, 'tel_id');
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

    public function vaga(){
        return $this->hasMany(Vaga::class);
    }

    public function solicitacao(){
        return $this->hasOne(Solicitacao::class);
    }

}
