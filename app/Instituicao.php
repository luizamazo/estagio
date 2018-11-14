<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    public function cursos(){
        return $this->hasMany('App\Curso');
    }

    public function contato()
    {
        return $this->hasOne('App\Contato');
    }
}
