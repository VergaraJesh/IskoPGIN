<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->increments('id',15);
            $table->string('answer1',255);
            $table->string('answer2',255);
            $table->string('answer21',255);
            $table->string('answer3',255);
            $table->string('answer31',255);
            $table->string('answer4',255);
            $table->string('answer5',255);
            $table->string('answer6',255);
            $table->timestamps();
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interviews');
    }
}
