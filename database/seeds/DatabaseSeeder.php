<?php

use Illuminate\Database\Seeder;
use App\Instituicao;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(EnderecoTableSeeder::class);
        $this->call(TelefoneTableSeeder::class); 
        $this->call(InstituicaoTableSeeder::class);
        $this->call(CampusTableSeeder::class);
        $this->call(CursoTableSeeder::class);
        $this->call(EmpresaTableSeeder::class);
        $this->call(PessoaTableSeeder::class);
        $this->call(CoordenadorTableSeeder::class);
        $this->call(SupervisorTableSeeder::class);
        $this->call(AlunoTableSeeder::class);
        $this->call(VagaTableSeeder::class);
        
        
    }
}
