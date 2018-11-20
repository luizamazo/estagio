<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
  
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('ramo');
            $table->string('cnpj')->unique();
            $table->string('telefone');
            $table->string('site');
            $table->string('email');
            $table->string('representante');
            $table->unsignedInteger('end_id');
            $table->foreign('end_id')->references('id')->on('enderecos')->onDelete('cascade');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
