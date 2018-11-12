<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    public function instituicao(){
        return $this->belongsTo(Instituicao::class, 'inst_id');
    }
}
