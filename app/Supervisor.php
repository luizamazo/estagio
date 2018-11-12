<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
