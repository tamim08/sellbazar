<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class SupplierChat extends Model
{
    
protected $fillable = [
'id',
'buyer_id',
'supplier_id',
'message',
'buyer_send',
'status'
];
                    
}
