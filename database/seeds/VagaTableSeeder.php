<?php

use Illuminate\Database\Seeder;
use App\Vaga;

class VagaTableSeeder extends Seeder
{

    public function run()
    {
        Vaga::create([
            'titulo' => 'Programação Web',
            'area'=>'Sistemas',
            'coor_id'=>1,
            'super_id'=>1,
            'empresa_id'=>1,
            'responsavel' => 'Lana Del Rey',
            'requisitos'=>'Ter passado em programação web........'
        ]);
    }
}
