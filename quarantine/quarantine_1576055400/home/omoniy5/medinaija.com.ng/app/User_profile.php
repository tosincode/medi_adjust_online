<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_profile extends Model
{
    protected $table = 'user_profiles';
    protected $fillable = [
    	'user_id',
        'full_name',
        'user',
        'email',
    	'dob',
    	'gender',
    	'address',
    	'city',
    	'country',
    	'phonenumber',
    	'blood_group',
    	'genotype',
    	'image',
        'description',
    	
    ];
   
}
