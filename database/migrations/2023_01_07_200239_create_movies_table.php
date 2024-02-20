<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string("Movie_Title");
            $table->text("Movie_Description");
            $table->string("Movie_Genre");
            $table->string("Movie_Runtime");
            $table->text("Movie_Cover");
            $table->text("Movie_Banner");
            $table->string("Movie_Rating");
            $table->string("Movie_Director");
            $table->string("Movie_Actors");
            $table->double("Movie_Year");
            $table->string("Movie_Trailer");
            $table->string("theatre_Id");
            $table->foreign('theatre_id')->references('id')->on('theatres');
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
        Schema::dropIfExists('movies');
    }
}
