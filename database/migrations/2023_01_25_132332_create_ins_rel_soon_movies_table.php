<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsRelSoonMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ins_rel_soon_movies', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description");
            $table->string("genre");
            $table->string("director");
            $table->string("releaseDate");
            $table->text("actors");
            $table->text("cover");
            $table->text("banner");
            $table->string("trailer");

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
        Schema::dropIfExists('ins_rel_soon_movies');
    }
}
