<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordenador extends Model
{
    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function vaga(){
        return $this->hasMany('App\Vaga');
    }

    public function contato()
    {
        return $this->hasOne('App\Contato');
    }
}
