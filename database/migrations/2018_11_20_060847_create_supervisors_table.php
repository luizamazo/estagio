<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupervisorsTable extends Migration
{
   
    public function up()
    {
        Schema::create('supervisors', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('pessoa_id');
            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onDelete('cascade');
            
            $table->unsignedInteger('tel_id');
            $table->foreign('tel_id')->references('id')->on('telefones');

            $table->unsignedInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->string('cargo');
            $table->string('area');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('supervisors');
    }
}
