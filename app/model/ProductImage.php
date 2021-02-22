<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    
protected $fillable = [
'id','src','product_id','serial'
];
                    
}
