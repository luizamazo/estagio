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
            $table->integer('rga')->unique();
            $table->string('cpf')->unique();;
            $table->integer('rg')->unique();;
            $table->string('contato');
            $table->string('endereco');
            $table->string('cidade');
            $table->string('cep');
            $table->string('instituicao');
            $table->string('campus');
            $table->string('curso');
            $table->string('semestre');
           

            $table->string('email')->unique();
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
