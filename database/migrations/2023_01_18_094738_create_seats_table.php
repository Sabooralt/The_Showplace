<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->string("seat_number");
            $table->boolean("available");
            $table->unsignedBigInteger('screening_id');
            $table->unsignedBigInteger('theatre_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('row_id');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('movie_id')->references('id')->on('movies');
            $table->foreign('screening_id')->references('id')->on('screenings');
            $table->foreign('row_id')->references('id')->on('rows');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seats');
    }
}
