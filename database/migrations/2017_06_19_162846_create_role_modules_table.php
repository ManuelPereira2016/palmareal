<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fk_id_role');
            $table->unsignedInteger('fk_id_module');
            $table->timestamps();

            $table->foreign('fk_id_role')->references('id')->on('roles');
            $table->foreign('fk_id_module')->references('id')->on('modules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles_modules');
    }
}
