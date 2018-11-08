<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->date('nascimento');
            $table->string('rga');
            $table->string('cpf');
            $table->string('rg');
            $table->string('curso_nome');
            $table->string('curso_inst');
            $table->string('inst_campus');
            $table->string('naturalidade');
            $table->string('telefone');
            $table->string('semestre');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
