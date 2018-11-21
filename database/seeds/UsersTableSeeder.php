<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin', //admin
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'role' => 'ADMIN'
        ]);

        User::create([
            'name' =>  'Lana', //coordenador
            'email' => 'lana@hotmail.com',
            'password' => bcrypt('123456'),
            'role' => 'COORDENADOR'
        ]);

        User::create([
            'name' =>  'Sansa', //supervisor
            'email' => 'sansa@hotmail.com',
            'password' => bcrypt('123456'),
            'role' => 'SUPERVISOR'
        ]);

        User::create([
            'name' =>  'Troste', //aluno
            'email' => 'troste@hotmail.com',
            'password' => bcrypt('123456'),
            'role' => 'ALUNO'
        ]);

      
    }
}

