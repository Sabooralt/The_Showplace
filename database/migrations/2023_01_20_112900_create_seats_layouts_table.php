<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatsLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats_layouts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('theatre_id')->unsigned();
        $table->foreign('theatre_id')->references('id')->on('theatres');
        $table->json('layout');
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
        Schema::dropIfExists('seats_layouts');
    }
}
