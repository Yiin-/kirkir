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

        /**
         * Visų augintinių lentelė
         */
        Schema::create('pets', function (Blueprint $table) {
            // Pagrindinis id šioje sistemoje
            $table->increments('id');

            // Augintinio vardas
            $table->string('name')->nullable();

            // Vartotojo, kuris užregistravo šį augintinį id šioje sistemoje
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
            // Jeigu useris ištrinamas,
            // pašalinam ir augintinį iš mūsų sistemos
                ->onDelete('cascade');

            // Augintinio tipas (katė, šuo, ?..)
            $table->integer('type_id')->unsigned()->nullable();
            $table->foreign('type_id')->references('id')->on('pet_types')
                ->onDelete('set null');

            // Veislės id šioje sistemoje
            $table->integer('breed_id')->unsigned()->nullable();
            $table->foreign('breed_id')->references('id')->on('breeds')
                ->onDelete('set null');

            // Ar augintinis yra patelė?
            $table->boolean('is_female');

            // Gimimo data (MMMM-mm-dd)
            $table->date('born_at')->nullable();

            // Aprašymas (HTML)
            $table->text('description');

            // Augintinio lokacija
            $table->string('location')->nullable();

            // Statusas (veisimui, pardavimui, etc)
            $table->text('status');

            // Sąvininko vardas, pavardė
            $table->string('owner')->nullable();

            // Veisėjo vardas, pavardė arba pavadinimas
            $table->string('breeder')->nullable();

            // Veislyno pavadinimas
            $table->string('cattery')->nullable();

            // Klubo pavadinimas
            $table->string('club')->nullable();

            // Veislinio patino (tėvo) id šioje sistemoje
            $table->integer('sire_id')->nullable();

            // Veislinės patelės (tėvo) id šioje sistemoje
            $table->integer('dam_id')->nullable();

            /**
             * top-cat.org informacija
             */
            // Augintinio profilio id
            $table->integer('topcat_profile_id')->nullable();
            // Veislinio patino (tėvo) id
            $table->integer('sire_topcat_profile_id')->nullable();
            // Veislinės patelės (motinos) id
            $table->integer('dam_topcat_profile_id')->nullable();

            // meta data
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
