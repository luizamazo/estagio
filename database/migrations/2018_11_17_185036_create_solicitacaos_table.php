<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitacaosTable extends Migration
{
    
    public function up()
    {
        Schema::create('solicitacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');

            $table->unsignedInteger('vaga_id');
            $table->foreign('vaga_id')->references('id')->on('vagas');

            $table->unsignedInteger('aluno_id');
            $table->foreign('aluno_id')->references('id')->on('alunos');

            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('solicitacaos');
    }
}
