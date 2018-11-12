<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordenador extends Model
{
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
