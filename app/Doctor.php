<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
   protected $table = 'doctors';
    protected $primaryKey = 'user_id';
    protected $fillable = [
    	'user_id',
        'full_name',
        'user',
        'email',
    	'dob',
    	'gender',
    	'address',
    	'website',
    	'city',
    	'country',
    	'phonenumber',
    	'affiliation',
    	'certification',
    	'residency',
    	'fellowship',
    	'experience',
    	'internship',
    	'medical_school',
    	'image',
    	'specialities',
    	'description'
    ];
}
