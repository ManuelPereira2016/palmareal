<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historical', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('transaction')->unsigned();
            $table->text('description');
            $table->integer('user')->unsigned();
            $table->timestamps();

            $table->foreign('user')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('historical');
    }
}
