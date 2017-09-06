<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name')->nuallable();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('usercode')->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('location')->nullable();
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->boolean('gender'); // 0: Masculino, 1: Femenino
            $table->boolean('kind'); // 0: Persona, 1: Empresa
            $table->boolean('status'); // 0: Inactivo, 1: Activo
            $table->date('birthday');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
