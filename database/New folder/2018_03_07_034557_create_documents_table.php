<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id',15);
            $table->binary('application')->nullable();
            $table->binary('pdsform')->nullable();
            $table->binary('cog')->nullable();
            $table->binary('nso')->nullable();
            $table->binary('bclearance')->nullable();
            $table->binary('goodmoral')->nullable();
            $table->binary('indigency')->nullable();
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
        Schema::dropIfExists('documents');
    }
}
