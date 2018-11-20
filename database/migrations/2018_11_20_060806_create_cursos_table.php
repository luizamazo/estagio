<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            //como campus tem chave estrangeira pra inst, preciso de foreign pra inst aqui? ---- preciso pra um where no controller
            $table->unsignedInteger('inst_id');
            $table->foreign('inst_id')->references('id')->on('instituicaos')->onDelete('cascade');
            $table->unsignedInteger('campus_id');
            $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
