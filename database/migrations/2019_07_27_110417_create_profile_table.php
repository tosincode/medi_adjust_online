<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
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
            $table->string('non_profit')->nullable();
            $table->string('cac_certified');
            $table->string('accreditation');
            $table->string('ownership_type');
            $table->integer('average_cost');
            $table->integer('bed_size')->nullable();
            $table->integer('length_of_stay');
            $table->string('specialities');
            $table->mediumText('image')->nullable();
            $table->timestamps();
        });
    }

    'gender',
        'address',
        'city',
        'country',
        'phonenumber',
        'blood_group',
        'genotype',
        'image',
        'description',

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}
