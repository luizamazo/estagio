<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstagiosTable extends Migration
{
   
    public function up()
    {
        Schema::create('estagios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->unsignedInteger('soli_id');
            $table->foreign('soli_id')->references('id')->on('solicitacaos');
            $table->timestamps();
            
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('estagios');
    }
}
