<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateTheatresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
        {
            Schema::create('theatres', function (Blueprint $table) {
                $table->id();
                $table->string("name");
                $table->string("location");
                $table->unsignedBigInteger('layout_id');
                $table->foreign('layout_id')->references('id')->on('seats_layouts');
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
        Schema::dropIfExists('theatres');
    }
}
