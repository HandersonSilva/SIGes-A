<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropagandaHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propaganda_homes', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('fk_instituicao_id')->unsigned();
            $table->foreign('fk_instituicao_id')->references('id')->on('instituicaos');
            $table->integer('fk_admin_instituicao_id')->unsigned();
            $table->foreign('fk_admin_instituicao_id')->references('id')->on('admin_instituicaos');
            $table->string('SGA_propaganda_cursoHome_nomeCurso');
            $table->string('SGA_propaganda_cursoHome_sobre');
            $table->float('SGA_propaganda_cursoHome_valor');
            $table->string('SGA_propaganda_cursoHome_dateInc');
            $table->string('SGA_propaganda_cursoHome_dateFim');
            $table->string('SGA_propaganda_cursoHome_img');
            $table->timestamps();
        });
/*para poder formatar um tipo date
        protected $dates = [
            'data_vencimento'
        ];*///exemplo $propaganda_homes->SGA_propaganda_cursoHome_dateInc->format('d/m/Y');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propaganda_homes');
    }
}
