<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class SupplierReview extends Model
{
    
    protected $fillable = [
        'id','supplier_id','buyer_id','review','rating','status'
        ];
                    
}
