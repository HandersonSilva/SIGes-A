<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituicaos', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->charset = 'utf8';
            $table->increments('id');
            $table->string('SGA_instituicao_nomeFantasia');
            $table->bigInteger('SGA_instituicao_cnpj');
            $table->integer('SGA_instituicao_telfixo');
            $table->integer('SGA_instituicao_celular');
            $table->string('SGA_instituicao_email');
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
        Schema::dropIfExists('instituicaos');
    }
}
