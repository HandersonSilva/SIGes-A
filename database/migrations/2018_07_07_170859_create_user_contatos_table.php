<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_contatos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_contato');
            $table->string('tel_contato');
            $table->string('email_contato');
            $table->string('msg_contato');
            $table->string('status_envio_email_adm');
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
        Schema::dropIfExists('user_contatos');
    }
}
