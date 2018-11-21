<?php

use Illuminate\Database\Seeder;
use App\Aluno;

class AlunoTableSeeder extends Seeder
{
    
    public function run()
    {
        Aluno::create([
            'pessoa_id'=>3,
            'end_id'=>3,
            'tel_id'=>3,
            'inst_id'=>1,
            'campus_id'=>1,
            'curso_id'=>1,
            'rga'=>'20155689865',
            'semestre'=>12

        ]);
    }
}
