<?php

use Illuminate\Database\Seeder;
use App\Endereco;

class EnderecoTableSeeder extends Seeder
{
    public function run()
    {
        Endereco::create([ //inst lo malo
        'rua'=>'Taki Taki',
        'bairro'=>'Rumba',
        'cidade'=>'Tristón',
        'cep'=>'78852-666'
    ]);

         Endereco::create([ //empresa la llorona
        'rua'=>'Toxic',
        'bairro'=>'Je veux',
        'cidade'=>'Tristón',
        'cep'=>'85555-222'
    ]);

        Endereco::create([ //pessoa 
        'rua'=>'Tricolor',
        'bairro'=>'SPFC',
        'cidade'=>'Tristón',
        'cep'=>'89689-000'
    ]);
    
    }
}
