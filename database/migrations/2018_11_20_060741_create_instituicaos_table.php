<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituicaosTable extends Migration
{
    
    public function up()
    {
        Schema::create('instituicaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email');
            $table->string('site');
            $table->string('tipo');
            $table->string('cnpj')->unique();
            $table->string('telefone');
            $table->unsignedInteger('end_id');
            $table->foreign('end_id')->references('id')->on('enderecos');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('instituicaos');
    }
}
