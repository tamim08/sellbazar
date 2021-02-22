<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    
protected $fillable = [
'id','tag_id','product_id'
];
                    
}
