<?php

use Illuminate\Database\Seeder;
use App\Campus;

class CampusTableSeeder extends Seeder
{
    public function run()
    {
        Campus::create([
        'nome'=>'Operacion Triunfo',
        'inst_id'=> 1
    ]);
    
    }
}
