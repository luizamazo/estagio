<?php

use Illuminate\Database\Seeder;
use App\Coordenador;

class CoordenadorTableSeeder extends Seeder
{
   
    public function run()
    {
        Coordenador::create([
            'pessoa_id' => 1,
            'tel_id' => 1,
            'inst_id' => 1,
            'campus_id' => 1,
            'curso_id' => 1,
            'cargo' => 'Professora',
            'siape' => '123456'
        ]);
    }
}
