<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   protected $table = 'payments';

    protected $fillable = [
        'user_id','payment_id','email','ip_address','amount','paid_at','transaction_at','channel','card_type','bank','brand',
    ];
}
