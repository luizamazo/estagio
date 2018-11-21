<?php

use Illuminate\Database\Seeder;
use App\Telefone;

class TelefoneTableSeeder extends Seeder
{
  
    public function run()
    {
        Telefone::create([ //coordenador
            'fixo'=>'2555-6589',
            'celular'=>'99985878'
        ]);

        Telefone::create([ //supervisor
            'fixo'=>'3226-1585',
            'celular'=>'(67) 99985-9856'
        ]);

        Telefone::create([ //aluno
            'fixo'=>'',
            'celular'=>'62 99995-5556'
        ]);
    }
}
