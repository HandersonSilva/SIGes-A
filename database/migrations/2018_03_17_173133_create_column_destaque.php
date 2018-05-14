<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnDestaque extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('propaganda_homes', function (Blueprint $table) {
            
            $table->enum('destaque',['S','N'])->default('S');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('propaganda_homes', function(Blueprint $table){
            $table->dropColumn('destaque');
        });
    }
}
