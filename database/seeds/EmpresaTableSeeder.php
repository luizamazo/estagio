<?php

use Illuminate\Database\Seeder;
use App\Empresa;

class EmpresaTableSeeder extends Seeder
{
 
    public function run()
    {
        Empresa::create([
            'nome'=>'La Llorona',
            'ramo'=>'Tecnologia',
            'cnpj'=>'15.133/7',
            'telefone'=>'3225-7809',
            'representante'=>'Jeshika',
            'email'=>'llorona@emp.com',
            'site'=>'llorona.com',
            'end_id'=>2
        ]);
       
    }
}
