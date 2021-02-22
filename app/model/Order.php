<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
protected $fillable = [
'id','buyer_id','area_id','status','discount','address'
];
                    
}
