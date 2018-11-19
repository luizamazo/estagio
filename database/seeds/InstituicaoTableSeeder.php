<?php

use Illuminate\Database\Seeder;
use App\Instituicao;

class InstituicaoTableSeeder extends Seeder
{
    public function run()
    {
        Instituicao::create([
        'nome'=>'Instituição Lo Malo',
        'email'=>'lomalo@inst.com',
        'site'=>'lomalo.com.br',
        'tipo'=>'Pública',
        'cnpj'=>'13/123.9',
        'telefone'=>'3225-6585',
        'end_id'=>1
    ]);

    }
}
