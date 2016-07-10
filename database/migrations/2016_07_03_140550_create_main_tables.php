<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMainTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->text('description');

            $table->string('path');

            $table->timestamps();
        });

        Schema::create('pet_types', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->text('description');

            $table->integer('image_id')->unsigned()->nullable();
            $table->foreign('image_id')->references('id')->on('images')
                ->onDelete('set null');

            $table->timestamps();
        });

        Schema::create('breeds', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('pet_type_id')->unsigned();
            $table->foreign('pet_type_id')->references('id')->on('pet_types')
                ->onDelete('cascade');

            $table->string('name');
            $table->integer('image_id')->unsigned()->nullable();
            $table->foreign('image_id')->references('id')->on('images')
                ->onDelete('set null');

            $table->timestamps();
        });

        Schema::create('pets', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('type_id')->unsigned()->nullable();
            $table->foreign('type_id')->references('id')->on('pet_types')
                ->onDelete('set null');

            $table->integer('breed_id')->unsigned()->nullable();
            $table->foreign('breed_id')->references('id')->on('breeds')
                ->onDelete('set null');

            $table->boolean('is_female');
            $table->date('born_at');
            $table->text('description');
            $table->string('location');

            $table->timestamps();
        });

        Schema::create('pet_image', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('pet_id')->unsigned();
            $table->foreign('pet_id')->references('id')->on('pets')
                ->onDelete('cascade');

            $table->integer('image_id')->unsigned();
            $table->foreign('image_id')->references('id')->on('images')
                ->onDelete('cascade');

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
        Schema::drop('pet_image');
        Schema::drop('pets');
        Schema::drop('breeds');
        Schema::drop('pet_types');
        Schema::drop('images');
    }
}
