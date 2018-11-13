<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('area');
            $table->string('requisitos');

            $table->unsignedInteger('super_id');
            $table->foreign('super_id')->references('id')->on('supervisors');
            
            $table->unsignedInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas');

            $table->unsignedInteger('coor_id');
            $table->foreign('coor_id')->references('id')->on('coordenadors');

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
        Schema::dropIfExists('vagas');
    }
}
