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
            $table->string('nome');
            $table->date('nascimento');
            $table->string('cpf');
            $table->string('rga');
            $table->string('rg');
            $table->string('fixo')->nullable();
            $table->string('celular');
    
            $table->string('titulo');
            $table->date('estagioInicio');
            $table->date('estagioFinal');
            $table->text('tarefas');
            $table->string('status');
            $table->string('carga');

            $table->unsignedInteger('vaga_id');
            $table->foreign('vaga_id')->references('id')->on('vagas');
            
            $table->unsignedInteger('aluno_id');
            $table->foreign('aluno_id')->references('id')->on('alunos');
            
            $table->unsignedInteger('super_id');
            $table->foreign('super_id')->references('id')->on('supervisors');
            
            $table->unsignedInteger('coor_id');
            $table->foreign('coor_id')->references('id')->on('coordenadors');

            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('solicitacaos');
    }
}
