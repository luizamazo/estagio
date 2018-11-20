<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
   
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('autor');
            $table->string('acao');
            $table->string('tipo');
            $table->string('alvo');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
