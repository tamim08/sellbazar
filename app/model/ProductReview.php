<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    
protected $fillable = [
'id','product_id','buyer_id','review','rating','status'
];
                    
}
