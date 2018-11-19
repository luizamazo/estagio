<?php

use Illuminate\Database\Seeder;

use App\Admin;

class AdminTableSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
        'name' =>  'Admin',
        'email' => 'admin@admin.com',
        'password' => bcrypt('123456'),
    ]);
        
    }
}
