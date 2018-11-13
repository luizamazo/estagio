<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public function vaga(){
        return $this->hasMany('App\Vaga');
    }
}
