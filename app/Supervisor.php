<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function vaga(){
        return $this->hasOne('App\Vaga');
    }

    public function contato()
    {
        return $this->hasOne('App\Contato');
    }
}
