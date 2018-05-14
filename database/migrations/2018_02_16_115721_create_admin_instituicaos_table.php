<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminInstituicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_instituicaos', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('fk_instituicao_id')->unsigned();
            $table->foreign('fk_instituicao_id')->references('id')->on('instituicaos');
            $table->string('SGA_admin_instituicao_nome');
            $table->string('SGA_admin_instituicao_email');
            $table->string('SGA_admin_instituicao_pass');
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
        Schema::dropIfExists('admin_instituicaos');
    }
}
