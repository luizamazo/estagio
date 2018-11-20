<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusesTable extends Migration
{
    
    public function up()
    {
        Schema::create('campuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->unsignedInteger('inst_id');
            $table->foreign('inst_id')->references('id')->on('instituicaos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('campuses');
    }
}
