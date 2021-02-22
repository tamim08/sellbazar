<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class SizeProduct extends Model
{
    
protected $fillable = [
'id','size_id','product_id'
];
public function Size(){
    return $this->belongsTo(Size::class);
}             
}
