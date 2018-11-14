<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rua')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('cep')->nullable();
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();

            $table->unsignedInteger('aluno_id');
            $table->foreign('aluno_id')->references('id')->on('alunos');
            
            $table->unsignedInteger('coord_id');
            $table->foreign('coord_id')->references('id')->on('coordenadors');

            $table->unsignedInteger('super_id');
            $table->foreign('super_id')->references('id')->on('supervisors');

            $table->unsignedInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas');

            $table->unsignedInteger('inst_id');
            $table->foreign('inst_id')->references('id')->on('instituicaos');

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
        Schema::dropIfExists('contatos');
    }
}
