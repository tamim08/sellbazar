<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    
protected $fillable = [
'id','name','image','details'
];
                    
}
