<?php

use Illuminate\Database\Seeder;
use App\Instituicao;

class InstTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instituicao::create([
           'nome' => 'Fundacao Universidade Federal De Mato Grosso Do Sul',
           'nome' => '',
           'cnpj' => '15.461.510/0001-33',
           'nome' => '',
           'nome' => '',
           'nome' => '',
           'nome' => '',
           'nome' => '',
        ]);
    }
}
