<?php

use Illuminate\Database\Seeder;
use App\Pessoa;

class PessoaTableSeeder extends Seeder
{
   
    public function run()
    {
        Pessoa::create([
            'nome' => 'Lana Del Rey',
            'nascimento' => '1996-02-06',
            'rg' => '123456',
            'cpf' => '78598636525',
            'user_id' => 2,
            'email' => 'lana@hotmail.com'
        ]);

        Pessoa::create([
            'nome' => 'Sansa Mazo',
            'nascimento' => '2016-10-08',
            'rg' => '789456',
            'cpf' => '66666666666',
            'user_id' => 3,
            'email' => 'sansa@hotmail.com'
        ]);
        
        Pessoa::create([
            'nome' => 'Troste Ikansado',
            'nascimento' => '1998-12-06',
            'rg' => '654321',
            'cpf' => '88888888888',
            'user_id' => 4,
            'email' => 'troste@hotmail.com'
        ]);
    }
}
