<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('description');
            $table->string('location')->nullable();
            $table->string('code');
            $table->string('type');
            $table->string('modality');
            $table->text('proximities')->nullable();
            $table->text('characteristics')->nullable();
            $table->text('tags')->nullable();
            $table->unsignedInteger('admin');
            $table->unsignedInteger('size')->default(0);
            $table->unsignedInteger('rooms')->default(0);
            $table->unsignedInteger('bathrooms')->default(0);
            $table->unsignedInteger('garages')->default(0);
            $table->unsignedInteger('antiquity')->nullable();
            $table->unsignedInteger('price')->default(0);
            $table->unsignedInteger('views')->default(0)->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->foreign('admin')->references('id')->on('admins');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
