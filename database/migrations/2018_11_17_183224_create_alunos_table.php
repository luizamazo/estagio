<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
   
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('pessoa_id');
            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onDelete('cascade');
            
            $table->unsignedInteger('end_id');
            $table->foreign('end_id')->references('id')->on('enderecos');
            
            $table->unsignedInteger('tel_id');
            $table->foreign('tel_id')->references('id')->on('telefones');
            
            $table->unsignedInteger('inst_id');
            $table->foreign('inst_id')->references('id')->on('instituicaos')->onDelete('cascade');
            
            $table->unsignedInteger('campus_id');
            $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');

            $table->unsignedInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos');
            
            $table->string('rga')->unique();
            $table->integer('semestre');
            
            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
