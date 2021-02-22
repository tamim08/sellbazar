<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ProductPaymentMethod extends Model
{
    
protected $fillable = [
'id','product_id','payment_method_id'
];
                    
}
