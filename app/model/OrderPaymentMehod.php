<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class OrderPaymentMehod extends Model
{
    
protected $fillable = [
'id','order_id','payment_method_id','details'
];
                    
}
