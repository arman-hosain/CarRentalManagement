<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class requestBooking extends Model
{
    //
    protected $fillable = [
        'customer_name', 'email', 'car_id','NID','request_date','message','picture','car_brand','request_status'
    ];
}
