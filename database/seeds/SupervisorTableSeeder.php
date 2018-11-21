<?php

use Illuminate\Database\Seeder;
use App\Supervisor;

class SupervisorTableSeeder extends Seeder
{
   
    public function run()
    {
        Supervisor::create([
            'pessoa_id'=>2,
            'tel_id'=>2,
            'empresa_id'=>1,
            'cargo'=>'Gerente de Projetos',
            'area'=>'Sei lá'
        ]);
    }
}
