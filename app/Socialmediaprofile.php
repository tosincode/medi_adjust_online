<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socialmediaprofile extends Model
{
    
    protected $table = 'socialmediaprofiles';

    protected $fillable = [
        'name','email',
    ];

}
