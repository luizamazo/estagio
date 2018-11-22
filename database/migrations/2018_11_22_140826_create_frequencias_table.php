<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrequenciasTable extends Migration
{
    
    public function up()
    {
        Schema::create('frequencias', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dia');
            $table->string('acao');
            $table->unsignedInteger('estagio_id');
            $table->foreign('estagio_id')->references('id')->on('estagios');
            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('frequencias');
    }
}
