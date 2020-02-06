<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('full_name');
            $table->string('user'); 
            $table->string('email')->unique();
            $table->text('dob');
            $table->string('gender')->nullable();
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->text('website');
            $table->text('phonenumber');
            $table->string('affiliation')->nullable();
            $table->string('certification');
            $table->string('residency');
            $table->string('fellowship');
            $table->integer('experience');
            $table->string('internship')->nullable();
            $table->string('medical_school');
            $table->mediumText('image')->nullable();
            $table->string('specialities');
            $table->string('description');
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
        Schema::dropIfExists('doctors');
    }
}
