<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefonesTable extends Migration
{
   
    public function up()
    {
        Schema::create('telefones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fixo')->nullable();
            $table->string('celular');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('telefones');
    }
}
