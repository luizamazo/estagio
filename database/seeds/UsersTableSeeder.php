<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' =>  'Lana', //coordenador
            'email' => 'lana@hotmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name' =>  'Sansa', //supervisor
            'email' => 'sansa@hotmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name' =>  'Troste', //aluno
            'email' => 'troste@hotmail.com',
            'password' => bcrypt('123456'),
        ]);

      
    }
}

