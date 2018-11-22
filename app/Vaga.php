<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    protected $fillable = [
        'titulo', 'area', 'empresa_id', 'super_id', 'coor_id', 'requisitos'
    ];

    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function supervisor(){
        return $this->belongsTo(Supervisor::class, 'super_id');
    }

    public function coordenador(){
        return $this->belongsTo(Coordenador::class, 'coor_id');
    }
    
    public function solicitacao(){
        return $this->hasMany(Solicitacao::class);
    }
}
