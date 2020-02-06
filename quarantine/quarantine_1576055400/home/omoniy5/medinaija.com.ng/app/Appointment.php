<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{


    protected $fillable = [
        'title', 'description', 'date', 'completed', 'user_id', 'doctor_id', 'time', 'Accept_appointment'
    ];

    public function appointments(){
        $this->belongsTo(User::class);
    }

}
