<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    
protected $fillable = [
'id',
'product_id',
'order_id',
'quantity',
'discount',
'color_id',
'size_id',
'price'
];
                    
}
