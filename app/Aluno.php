<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function solicitacao()
    {
        return $this->hasMany('App\Solicitacao');
    }

    public function contato()
    {
        return $this->hasOne('App\Contato');
    }
}
