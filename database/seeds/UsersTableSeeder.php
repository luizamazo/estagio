<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' =>  'Lana Del Rey', //coordenador
            'email' => 'lana@hotmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name' =>  'Troste', //aluno
            'email' => 'troste@hotmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name' =>  'Sansa', //supervisor
            'email' => 'sansa@hotmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
