<?php

use Illuminate\Database\Seeder;
use App\Curso;

class CursoTableSeeder extends Seeder
{
    public function run()
    {
        Curso::create([
        'nome'=>'Sistemas de Informação',
        'inst_id' => 1,
        'campus_id'=> 1
    ]);
    
    }
}
