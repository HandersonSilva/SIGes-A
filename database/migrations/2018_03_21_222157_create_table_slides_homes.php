<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSlidesHomes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slidesHomes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imagem')->default('img/curso4.jpg');
            $table->integer('fk_instituicao_id_slide')->unsigned();
            $table->integer('fk_admin_instituicao_id_slide')->unsigned();
            $table->foreign('fk_admin_instituicao_id_slide')->references('id')->on('admin_instituicaos');
            $table->foreign('fk_instituicao_id_slide')->references('id')->on('instituicaos');
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
        Schema::dropIfExists('slidesHomes');
    }
}
