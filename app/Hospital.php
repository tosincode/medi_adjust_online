<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
   
 protected $table = 'hospitals';
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
        'non_profit',
        'cac_certified',
        'accreditation',
        'ownership_type',
        'average_cost',
        'bed_size',
        'length_of_stay',
        'specialities',
        'image'
        
    ];
}
