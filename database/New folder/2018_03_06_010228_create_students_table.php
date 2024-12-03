<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->binary('pic')->nullable();
            $table->string('fname',255);
            $table->string('mname',255)->nullable();
            $table->string('lname',255);
            $table->string('suffix',255)->nullable();
            $table->string('gender',255)->nullable();
            $table->string('scholartype',255);
            $table->string('age',2)->nullable();
            $table->string('status',255)->nullable();
            $table->string('result_interview',255)->nullable();
            $table->string('result_exam',255)->nullable();
            $table->string('civilstatus',255)->nullable();
            $table->string('skills',255)->nullable();
            $table->string('cur_brgy',255)->nullable();
            $table->string('cur_mun',255)->nullable();
            $table->string('perma_brgy',255)->nullable();
            $table->string('perma_mun',255)->nullable();
            $table->string('code',8)->default("N/A")->nullable();
            $table->string('dob')->default("N/A")->nullable(); 
            $table->string('contact')->default("N/A")->nullable();
            $table->string('contact1')->default("N/A")->nullable();    
            $table->string('email')->default("N/A")->nullable(); 
            $table->string('altemail')->default("N/A")->nullable(); 
            $table->string('income')->default("N/A")->nullable();
            $table->string('employment')->default("N/A")->nullable();
            $table->string('staff',255)->nullable();
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
        Schema::dropIfExists('students');
    }
}
