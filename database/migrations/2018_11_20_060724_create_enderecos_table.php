<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rua');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('cep');

            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
